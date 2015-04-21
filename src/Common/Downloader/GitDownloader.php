<?php

namespace XTheme\Common\Downloader;

use XTheme\Common\Model\Package;

class GitDownloader implements DownloaderInterface
{
    public function download(Package $package, $xthemepath)
    {
        $targetpath = $xthemepath . '/' . $package->getName();
        if (file_exists($targetpath)) {
            $cmd = "cd " . $targetpath . " && git pull origin master";
        } else {
            $cmd = "git clone " . $package->getSourceUrl() . ' ' . $targetpath;
        }
        $res = exec($cmd, $output);
        print_r($output);
    }
}
