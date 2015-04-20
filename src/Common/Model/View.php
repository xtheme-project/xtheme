<?php

namespace XTheme\Common\Model;

class View
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
    
    private $description;
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    private $variables;
    
    public function getVariables()
    {
        return $this->variables;
    }
    
    public function setVariable(Variable $variable)
    {
        $this->variables[$variable->getId()] = $variable;
    }
    
}
