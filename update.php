<?php
include_once('./resources/template/header.html');
?>

<?php

include_once './app/config/Database.php';
include_once './app/UserController.php';

$database = new Database();
$db = $database->getConnection();

$items = new UserController($db);
$_user = $items->getUserById(1);


print_r($_GET["user"]);

?>




<?php
include_once('./resources/template/footer.html'); ?>