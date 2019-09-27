<?php

namespace Src\Models;

use PDO;

class Database
{
    private $username = 'sql7306624';
    private $host = 'sql7.freesqldatabase.com';
    private $port = '3306';
    private $db_name = 'sql7306624';
    private $password = 'qJlcurqWtC';
    private $error;
    private $statement;         
    private $connection;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ";port=" . $this->port . ";db_name=" .$this->db_name,
            $this->username, $this->password, $options);
            $sql = file_get_contents(__DIR__ . '/../../data/init.sql');
            $this->connection->exec($sql);
            echo 'migrated succesfully';
        } catch(PDOException $error) {
            echo 'connection error' . $error->getMessage;
        }
        $this->connection;
    }

    public function query($query)
    {
        $this->statement = $this->connection->prepare($query);
    }

    public function bind($parameter, $value, $type = null)
    {
        if(is_null($type))
        {
            switch (true) {
                case is_int($value):
                $type = PDO::PARAM_INT;
                break;
                default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindvalue($parameter, $value, $type);
    }

    public function execute()
    {
        try {
            return $this->statement->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function resultSet()
    {
        $this->execute();
        $this->statement->fetchALL();
    }

    public function result()
    {
        $this->execute();
        return $this->statement->fetchALL();
    }
}