<?php

namespace XTheme\Common\Model;

class XTheme
{
    private $id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    private $name;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    private $description;
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    private $options = array();
    
    public function addOption(Option $option)
    {
        $this->options[$option->getId()] = $option;
    }
    
    public function getOptions()
    {
        return $this->options;
    }
    
    public function getOption($id)
    {
        return $this->options[$id];
    }
    
    private $views;
    
    public function addView(View $view)
    {
        $this->views[$view->getId()] = $view;
    }
    
    public function getViews()
    {
        return $this->views;
    }
}
