<?php

namespace XTheme\Service;

use XTheme\Common\LoaderInterface;
use XTheme\Common\Model\XTheme;
use XTheme\Service\XThemeLoader\ArrayXThemeLoader;

class Loader implements LoaderInterface
{
    private $xthemepath;
    
    public function __construct($xthemepath)
    {
        $this->xthemepath = $xthemepath;
    }
    
    public function getXTheme($xthemename)
    {
        $xtheme = new XTheme();
        $themeloader = new ArrayXThemeLoader();
        $json = file_get_contents($this->xthemepath . '/' . $xthemename . '/xtheme.json');
        $config = json_decode($json, true);
        $themeloader->loadConfig($xtheme, $config);
        return $xtheme;
    }
}
