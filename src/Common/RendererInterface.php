<?php

namespace XTheme\Common;

interface RendererInterface
{
    public function render($viewid, $data = array());
}
