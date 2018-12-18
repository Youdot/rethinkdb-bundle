<?php

namespace Youdot\RethinkDBBundle\Service;

use function r\connect;
use r\Query;

class RethinkDB
{
    /**
     * @var null|string
     */
    private $hostname;
    /**
     * @var null|string
     */
    private $port;
    /**
     * @var null|string
     */
    private $database;
    /**
     * @var null|string
     */
    private $apiKey;
    /**
     * @var null|string
     */
    private $timeout;

    public function __construct(?string $hostname, ?string $port, ?string $database, ?string $apiKey, ?string $timeout)
    {

        $this->hostname = $hostname;
        $this->port = $port;
        $this->database = $database;
        $this->apiKey = $apiKey;
        $this->timeout = $timeout;
    }

    public function getConnection()
    {
        return connect($this->hostname, $this->port, $this->database, $this->apiKey, $this->timeout);
    }

    public function run(Query $query)
    {
        $connection = $this->getConnection();
        return $query->run($connection);
    }
}
