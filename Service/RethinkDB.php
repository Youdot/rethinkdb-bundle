<?php

namespace Youdot\RethinkDBBundle\Service;

use function r\connect;
use r\Query;

class RethinkDB
{
    private $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getConnection()
    {
        [$hostname, $port, $database, $apiKey, $timeout] = $this->parameters;
        return connect($hostname, $port, $database, $apiKey, $timeout);
    }

    public function run(Query $query)
    {
        $connection = $this->getConnection();
        return $query->run($connection);
    }
}
