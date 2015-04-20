<?php

namespace XTheme\Service;

use XTheme\Common\RendererInterface;
use XTheme\Common\LoaderInterface;

class Renderer implements RendererInterface
{
    private $loader;
    
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }
    
    public function render($viewid, $data = array())
    {
        return "RENDERED";
    }
}
