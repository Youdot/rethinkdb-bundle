<?php

namespace Youdot\RethinkDBBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('rethinkdb');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('hostname')->end()
                ->scalarNode('port')->defaultNull()->end()
                ->scalarNode('database')->defaultNull()->end()
                ->scalarNode('apiKey')->defaultNull()->end()
                ->scalarNode('timeout')->defaultNull()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
