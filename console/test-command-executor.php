<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$containerBuilder = new ContainerBuilder();

$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));

try {

    $loader->load('services.yaml');
    $bus = $containerBuilder->get('tactician.command_bus');

} catch (\Exception $e) {
    echo $e.PHP_EOL;
}
