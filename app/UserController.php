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
        $sqlQuery = "SELECT * FROM users WHERE id=$id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateUser($id, $data)
    {

        $sql = "UPDATE users SET name=?, last_name=?, email=?, phone_number=?, dob=?, bio=?, avatar=? WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(
            [
                $data["name"], $data["last_name"], $data["email"], $data["phone_number"],
                $data["dob"], $data["bio"], $data["avatar"], $id
            ]
        );
        return $stmt;
    }
}
