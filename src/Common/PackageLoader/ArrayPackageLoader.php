<?php

namespace XTheme\Common\PackageLoader;

use XTheme\Common\Model\Package;
use XTheme\Common\Model\Option;
use XTheme\Common\Model\View;
use XTheme\Common\Model\Variable;
use XTheme\Common\Model\Dependency;
use InvalidArgumentException;

class ArrayPackageLoader
{
    public function load(Package $package, $config)
    {
        if (!$config) {
            throw new InvalidArgumentException("Invalid data passed to loader");
        }
        if (isset($config['name'])) {
            $package->setName($config['name']);
        }
        
        if (isset($config['description'])) {
            $package->setDescription($config['description']);
        }

        if (isset($config['requires'])) {
            foreach ($config['requires'] as $name => $version) {
                $dependency = new Dependency();
                $dependency->setName($name);
                $dependency->setVersion($version);
                $package->addDependency($dependency);
            }
        }
        
        if (isset($config['options'])) {
            foreach ($config['options'] as $key => $optionData) {
                $option = new Option();
                $option->setId($optionData['id']);
                $option->setType($optionData['type']);
                $option->setLabel($optionData['label']);
                $option->setDescription($optionData['description']);
                $package->addOption($option);
            }
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


                $package->addView($view);
            }
        }
        */

    }
}
