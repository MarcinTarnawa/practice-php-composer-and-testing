<?php

namespace Core;

use PDO;

class Database
{
    private $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // universal query
    public function query($query, $params = [])
    {
        $statment = $this->connection->prepare($query);
        $statment->execute($params);
        return $statment;
    }

    public function addLog($user, $operation, $dbname)
    {
        $query = "INSERT INTO log (id, user_id, operation, table_name) VALUES (NULL, :user, :operation, :dbname)";
        $statment = $this->connection->prepare($query);
        $statment->bindParam(':user', $user);
        $statment->bindParam(':operation', $operation);
        $statment->bindParam(':dbname', $dbname);
        $statment->execute();
        return $statment;
    }

    public function selectRecordById($id, $tableName)
    {
        if (!is_numeric($id)) {
            return null;
        }
        $sql = "SELECT * FROM $tableName WHERE `id` = :id";
        $statment = $this->connection->prepare($sql);
        $statment->bindValue(':id', $id, PDO::PARAM_INT);
        $statment->execute();
        $record = $statment->fetch(PDO::FETCH_ASSOC);

        return $record;
    }

    public function canPerformAction(int $userId, string $tableName, string $operationType): bool {
        $sql = "SELECT 1 FROM user_permissions WHERE user_id = :userId AND table_name = :tableName AND operation_type = :operationType";
        
        $statment = $this->connection->prepare($sql);
        $statment->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statment->bindValue(':tableName', $tableName, PDO::PARAM_STR);
        $statment->bindValue(':operationType', $operationType, PDO::PARAM_STR);
        $statment->execute();
        
        return (bool)$statment->fetchColumn();
    }

    public function grantPermission(int $userId, string $tableName, string $operationType): bool {
        $sql = "INSERT INTO user_permissions (user_id, table_name, operation_type) VALUES (:userId, :tableName, :operationType)";
        
        $statment = $this->connection->prepare($sql);
        $statment->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statment->bindValue(':tableName', $tableName, PDO::PARAM_STR);
        $statment->bindValue(':operationType', $operationType, PDO::PARAM_STR);
        $statment->execute();

        return $statment;
    }
}