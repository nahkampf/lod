<?php

namespace LOD;

use mysqli;
use mysqli_result;
use Throwable;

class DB
{
    private mysqli $connection;

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
    ) {
        if (!$conn = mysqli_connect($host, $username, $password, $database, $port)) {
            throw new \Exception('No database connection.');
        } else {
            $this->connection = $conn;
        }
    }

    public function query(string $query): mysqli_result|bool
    {
        return $this->connection->query($query);
    }

    /**
     * @return array<mixed>|false|null
     */
    public function fetchAll(mysqli_result $result): array|false|null
    {
        return $result->fetch_assoc();
    }

    public function numRows(mysqli_result $result): int|string
    {
        return $result->num_rows;
    }

    public function lastId(): int
    {
        return (int)$this->connection->insert_id;
    }
}
