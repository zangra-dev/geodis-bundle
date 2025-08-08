<?php declare(strict_types=1);

namespace GeodisBundle\DependencyInjection;

use GeodisBundle\Service\GeodisJsonApi;
use GeodisBundle\Service\DAO\Connection;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class GeodisExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        // Alias BC @geodis.rest_api -> FQCN
        if ($container->has(GeodisJsonApi::class) && !$container->hasAlias('geodis.rest_api')) {
            $container->setAlias('geodis.rest_api', (new Alias(GeodisJsonApi::class))->setPublic(true));
        }

        // Injecter la config + lazy
        foreach ([GeodisJsonApi::class, Connection::class, 'geodis.rest_api'] as $id) {
            if ($container->hasDefinition($id)) {
                $def = $container->getDefinition($id);
                $def->setLazy(true)
                    ->addMethodCall('setConfig', [$config]);
                break;
            }
        }
    }
}
