<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use TacticianSfDi\Application\FlowsOk\FlowsOkCommand;
use TacticianSfDi\Application\ThrowsException\ThrowsExceptionCommand;

$containerBuilder = new ContainerBuilder();

$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));

try {

    $loader->load('services.yaml');
    $bus = $containerBuilder->get('tactician.command_bus');

    $commands = [
        new FlowsOkCommand(),
        new ThrowsExceptionCommand()
    ];
    foreach ($commands as $command) {
        $bus->handle($command);
    }

} catch (\Exception $e) {
}
