<?php

namespace Youdot\RethinkDBBundle\Service;

use function r\connect;
use r\Query;

class Connection
{
    private $connection;

    public function __construct($parameters)
    {
        $this->connection = connect($parameters['hostname'], $parameters['port'], $parameters['database'], $parameters['apiKey'], $parameters['timeout']);
    }

    public function run(Query $query)
    {
       return $query->run($this->connection);
    }
}
