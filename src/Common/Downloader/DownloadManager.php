<?php

namespace XTheme\Common\Downloader;

use XTheme\Common\Model\Package;
use RuntimeException;

class DownloadManager
{
    private $xthemepath;
    public function __construct($xthemepath)
    {
        $this->xthemepath = $xthemepath;
    }
    
    private $downloaders = array();
    
    public function registerDownloader($sourceType, DownloaderInterface $downloader)
    {
        $this->downloaders[$sourceType] = $downloader;
    }
    
    public function download(Package $package)
    {
        $sourceType = $package->getSourceType();
        if (!isset($this->downloaders[$sourceType])) {
            throw new RuntimeException("No registered downloader for sourcetype: " . $sourceType);
        }
        $downloader = $this->downloaders[$sourceType];
        $downloader->download($package, $this->xthemepath);
    }
}
