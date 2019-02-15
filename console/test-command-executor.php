<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use \TacticianSfDi\Application\FlowsOk\FlowsOkCommand;

$containerBuilder = new ContainerBuilder();

$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));

try {
    $loader->load('services.yaml');
    $bus = $containerBuilder->get('tactician.command_bus');

    $bus->handle(new FlowsOkCommand());

} catch (\Exception $e) {
    echo $e . PHP_EOL;
}
