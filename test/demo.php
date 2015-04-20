<?php

require_once __DIR__ . '/../vendor/autoload.php';

use XTheme\Service\Loader;
use XTheme\Service\Renderer;

$config = array("primary-color" => "#ff0000");

$xthemepath = __DIR__ . '/../xtheme';
$loader = new Loader($xthemepath);
$renderer = new Renderer($loader);
$theme = $loader->getXTheme('xtheme-theme-default');
var_dump($theme);

$data = array(
    "product" => array(
        "code" => "1234",
        "name" => "Example product",
        "description" => "Lorum ipsum"
    )
);

$html = $renderer->render("product/detail", $data);

echo "--- OUTPUT ---\n";
echo $html;
exit("\n--- DONE ---\n");
