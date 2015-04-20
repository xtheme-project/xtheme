<?php

namespace XTheme\Service\XThemeLoader;

use XTheme\Common\Model\XTheme;
use XTheme\Common\Model\Option;
use XTheme\Common\Model\View;
use XTheme\Common\Model\Variable;

class ArrayXThemeLoader
{
    public function loadConfig(XTheme $theme, $config)
    {
        if (isset($config['name'])) {
            $theme->setName($config['name']);
        }
        
        if (isset($config['description'])) {
            $theme->setDescription($config['description']);
        }
        
        foreach ($config['options'] as $key => $optionData) {
            $option = new Option();
            $option->setId($optionData['id']);
            $option->setType($optionData['type']);
            $option->setLabel($optionData['label']);
            $option->setDescription($optionData['description']);
            $theme->addOption($option);
        }
        /*
        if (isset($config['implements'])) {
            foreach ($config['implements'] as $id) {
                $viewtypecollection = new ViewTypeCollection();
            }
        }

        if (isset($config['views'])) {
            foreach ($config['views'] as $viewData) {
                $view = new View();
                $view->setId($viewData['id']);
                $view->setDescription($viewData['description']);

                if (isset($viewData['variables'])) {
                    foreach ($viewData['variables'] as $variableData) {
                        $variable = new Variable();
                        $variable->setId($variableData['id']);
                        $variable->setDescription($variableData['description']);
                        $variable->setType($variableData['type']);
                        $view->setVariable($variable);
                    }
                }


                $theme->addView($view);
            }
        }
        */

    }
}
