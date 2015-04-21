<?php

namespace XTheme\Common\Downloader;

use XTheme\Common\Model\Package;

interface DownloaderInterface
{
    public function download(Package $package, $xthemepath);
}
