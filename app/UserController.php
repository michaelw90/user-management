<?php

include_once './config/Database.php';

class UserController
{


    private $connection;
    const TABLE = "users";

    public function __construct($db)
    {

        $this->connection = $db;
    }



    public function getUsers()
    {
        $sqlQuery = "SELECT * FROM " . self::TABLE . "";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserById($id)
    {
        $sqlQuery = "SELECT * FROM " . self::TABLE . "WHERE id =$id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_OBJ);
    }
}
