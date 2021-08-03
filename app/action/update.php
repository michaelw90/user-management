<?php




if (isset($_GET["user"])) {

    include_once '../config/Database.php';
    include_once '../UserController.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new UserController($db);

    $file_tmp = $_FILES['avatar']['tmp_name'];
    $file_name = $_FILES['avatar']['name'];
    $image_dir = "../../public/images/";
    $avatar_url = $image_dir . $file_name;
    move_uploaded_file($file_tmp, $avatar_url);


    $data = [
        "avatar" => "./public/images/".$file_name,
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "phone_number" => $_POST["phone_number"],
        "bio" => $_POST["bio"],
        "last_name" => $_POST["last_name"],
        "dob" => $_POST["dob"]
    ];

    $result = $items->updateUser($_GET["user"], $data);

    header('Location: ../../index.php');
}
