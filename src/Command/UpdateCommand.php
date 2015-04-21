<?php

namespace XTheme\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use XTheme\Common\PackageLoader\ArrayPackageLoader;
use XTheme\Common\Repository\StaticRepository;
use XTheme\Common\Downloader\GitDownloader;
use XTheme\Common\Downloader\DownloadManager;
use XTheme\Common\Model\Package;
use RuntimeException;

class UpdateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('update')
            ->setDescription('Update xtheme.lock based on xtheme.json')
            ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write("<info>Updating</info>\n");


        // Load xtheme.json
        $filename = "xtheme.json";
        
        if (!file_exists($filename)) {
            throw new RuntimeException("xtheme.json not found");
        }
        $json = file_get_contents($filename);
        $data = json_decode($json, true);
        if (!$data) {
            throw new RuntimeException("Could not parse xtheme.json file");
        }
        
        // Ensure xtheme path exists
        $xthemepath = "./xtheme";
        if (!file_exists($xthemepath)) {
            mkdir($xthemepath);
        }

        $packageloader = new ArrayPackageLoader();
        $package = new Package();
        $packageloader->load($package, $data);
        
        $registry = new StaticRepository();
        
        $downloadManager = new DownloadManager($xthemepath);
        $downloader = new GitDownloader();
        $downloadManager->registerDownloader("git", $downloader);
        
        
        $output->writeLn("Package: " . $package->getName());
        
        foreach ($package->getDependencies() as $dependency) {
            $output->writeLn(" - " . $dependency->getName() . ": " . $dependency->getVersion());
            $p = $registry->findPackage($dependency->getName(), $dependency->getVersion());
            $output->writeLn("    * " . $p->getSourceType() . ": " . $p->getSourceUrl());
            $downloadManager->download($p);
        }
        
        $output->write("<info>Done</info>\n");
    }
}
