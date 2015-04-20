<?php

namespace XTheme\Common;

interface LoaderInterface
{
    public function getXTheme($xthemename);
    /*
    public function getOptions();
    public function setOption($optionid, $value);
    public function getViewInfo();
    public function getViewDescriptionById($viewid);
    public function hasView($viewid);
    public function getViewVariables($viewid);
    */
}
