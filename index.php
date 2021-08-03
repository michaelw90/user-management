<?php
include_once('./resources/template/header.html');
?>

<?php

include_once './app/config/Database.php';
include_once './app/UserController.php';

$database = new Database();
$db = $database->getConnection();

$items = new UserController($db);
$_users = $items->getUsers();


?>
<div class="row">

    <?php foreach ($_users as $user) : ?>
        <?php $updateUrl = "update.php?user=" . $user->id;
        $src = $user->avatar;
        ?>
        <div class="col-sm-6">
            <div class="card">
                <img class="card-img-top"  src="<?php echo  $src ?>" alt="Card image cap">

                <div class="card-body">
                    <h5 class="card-title"><?php echo  $user->name . " " . $user->last_name ?></h5>
                    <a href="<?php echo $updateUrl ?>" class="btn btn-warning">Update profile</a>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
</div>



<?php
include_once('./resources/template/footer.html'); ?>