<?php

namespace App\lib;

use PDO;

class DB
{
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new PDO(
            'mysql:host='.$config['host'].';
            dbname='.$config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function all($sql, $params = []): array
    {
        $query = $this->query($sql, $params);
        return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function first($sql, $params = []): array
    {
        $query = $this->query($sql, $params);
        return $query->rowCount() > 0 ? $query->fetch(PDO::FETCH_ASSOC) : [];
    }

    /**
     * @param $sql
     * @param array $params
     * @return false|\PDOStatement
     */
    public function query($sql, $params = [])
    {
        $statement = $this->db->prepare($sql);

        if (!empty($params))
            foreach ($params as $name => $value)
                $statement->bindValue(':' . $name, $value);

        $statement->execute();
        return $statement;
    }
}
