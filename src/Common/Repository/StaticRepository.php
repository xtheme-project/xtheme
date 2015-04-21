<?php

namespace XTheme\Common\Repository;

use XTheme\Common\Model\Package;

class StaticRepository
{
    private $packages;
    
    public function __construct()
    {
        $package = new Package();
        $package->setName("xtheme-theme-default");
        $package->setVersion("1.0.0");
        $package->setSourceType("git");
        $package->setSourceUrl("https://github.com/xtheme-project/xtheme-theme-default");
        
        $this->packages[] = $package;
    }
    
    public function findPackage($name, $version)
    {
        return $this->packages[0];
    }
}
