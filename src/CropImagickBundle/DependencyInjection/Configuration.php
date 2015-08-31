<?php

namespace CropImagickBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('crop_imagick');

        $rootNode
            ->children()
                ->scalarNode('cache_path')->defaultValue('images/crop_imagick')->end()
                ->arrayNode('sizes')
//                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('name')->end()
                            ->integerNode('width')->end()
                            ->integerNode('height')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ;
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
