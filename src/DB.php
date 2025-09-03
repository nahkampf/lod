<?php
namespace LOD;

use \mysqli, \mysqli_result;
use Throwable;

class DB
{
    private mysqli|false $connection;

    /**
     * Set up the DB
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @param integer $port
     * @throws Throwable
     */
    public function __construct(
        string $host,
        string $username,
        string $password,
        string $database,
        int $port = 3306
    )
    {
        if(!$this->connection = mysqli_connect($host, $username, $password, $database, $port)) {
            throw new Throwable('No database connection.');
        };
    }

    public function query(string $query): mysqli_result|bool
    {
        return $this->connection->query($query);
    }

    public function fetchAll(mysqli_result $result): array
    {
        return $result->fetch_assoc($result);
    }

    public function numRows(mysqli_result $result): int|string
    {
        return $result->num_rows;
    }

    public function lastId(): int
    {
        return $this->connection->insert_id;
    }
}
