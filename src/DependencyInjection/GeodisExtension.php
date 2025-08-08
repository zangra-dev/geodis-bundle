<?php declare(strict_types=1);

namespace GeodisBundle\DependencyInjection;

use GeodisBundle\Manager\GeodisJsonApi;
use GeodisBundle\Service\DAO\Connection; // si la classe existe encore chez toi
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

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        // Alias de rétro-compat pour les projets qui utilisent encore "geodis.rest_api"
        if ($container->has(GeodisJsonApi::class) && !$container->hasAlias('geodis.rest_api')) {
            $container->setAlias('geodis.rest_api', (new Alias(GeodisJsonApi::class))->setPublic(true));
        }

        // On tente d’injecter la config sur le bon service (ordre de préférence)
        $candidates = [
            GeodisJsonApi::class,
            Connection::class,   // enlève cette ligne si tu n’as plus Connection
            'geodis.rest_api',   // filet de sécurité
        ];

        foreach ($candidates as $id) {
            if ($container->hasDefinition($id)) {
                $def = $container->getDefinition($id);
                $def->setLazy(true);
                $def->addMethodCall('setConfig', [$config]); // instance method
                break;
            }
        }
    }
}