<?php
declare(strict_types=1);

namespace GeodisBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('geodis_shipment');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('baseUrl')->defaultValue('')->end()
                ->scalarNode('serviceRecordSend')->defaultValue('')->end()
                ->scalarNode('serviceValidationSend')->defaultValue('')->end()
                ->scalarNode('clientId')->defaultValue('')->end()
                ->scalarNode('clientSecret')->defaultValue('')->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
