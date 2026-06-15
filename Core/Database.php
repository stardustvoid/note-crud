<?php

namespace Core;

use PDO;

class Database
{
    public $connection;

    public $statement;

    public function __construct($config, $user, $password)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $parameters = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($parameters);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetch();
    }

    public function getAll()
    {
        return $this->statement->fetchAll();
    }

    public function getOrAbort()
    {
        $result = $this->get();

        if (!$result) {
            abort();
        }

        return $result;
    }
}