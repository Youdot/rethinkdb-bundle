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
        $hostname = $mergedConfig['hostname'];
        $port = $mergedConfig['port'];
        $database = $mergedConfig['database'];
        $apiKey = $mergedConfig['apiKey'];
        $timeout = $mergedConfig['timeout'];

        $container
            ->register(
                'Youdot\RethinkDBBundle\Service\RethinkDB',
                'Youdot\RethinkDBBundle\Service\RethinkDB'
            )
            ->addArgument($hostname)
            ->addArgument($port)
            ->addArgument($database)
            ->addArgument($apiKey)
            ->addArgument($timeout)
        ;
    }
}
