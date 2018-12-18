<?php

namespace Youdot\RethinkDBBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class RethinkDBExtension extends ConfigurableExtension
{
    public function getAlias()
    {
        return 'rethinkdb';
    }

    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $container->register(
            'Youdot\RethinkDBBundle\Service\RethinkDB',
            'Youdot\RethinkDBBundle\Service\RethinkDB'
        )->addArgument($mergedConfig);
    }
}
