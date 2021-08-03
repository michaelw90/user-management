<?php

use function PHPSTORM_META\type;

include_once('./resources/template/header.html');
?>

<?php

if (isset($_GET["user"])) {

    include_once './app/config/Database.php';
    include_once './app/UserController.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new UserController($db);
    $_user = $items->getUserById($_GET["user"]);
?>
    <?php if (empty($_user)) : ?>
        <div class="alert alert-warning" role="alert">
            User not found
        </div>
    <?php else : ?>


        <?php

        $_user = $_user[0];

        ?>
        <form class="row form-group" method="POST" enctype="multipart/form-data" action="app/action/update.php?user=<?php echo $_user->id ?>">
            <div class="col-md-4 mt-4 border-right">
                <div class="row">

                    <div class="d-flex flex-column align-items-center text-center">
                        <img class="rounded-circle" width="200" src="<?php echo $_user->avatar ?>">
                        <label class="form-label" for="avatar">Update profile image
                            <input type="file" class="form-control" id="avatar" name="avatar" value="<?php echo $_user->avatar ?>" />
                    </div>
                </div>

            </div>
            <div class="col-md-5 border-right mt-5">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Update</h4>
                    </div>

                    <div class="row ">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control my-2" placeholder="<?php echo $_user->name ?>" value="<?php echo $_user->name ?>"></div>
                        <div class="col-md-12"><label class="labels">Last Name</label><input type="text" name="last_name" class="form-control my-2" placeholder="<?php echo $_user->last_name ?>" value="<?php echo $_user->last_name ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" name="email" class="form-control my-2" placeholder="<?php echo $_user->email ?>" value="<?php echo $_user->email ?>"></div>
                        <div class="col-md-12"><label class="labels">Phone numver</label><input type="text" name="phone_number" class="form-control my-2" placeholder="<?php echo $_user->phone_number ?>" value="<?php echo $_user->phone_number ?>"></div>

                        <div class="col-md-12"><label class="labels">Date of birth</label><input type="text" name="dob" class="form-control my-2" placeholder="<?php echo $_user->dob ?>" value="<?php echo $_user->dob ?>"></div>
                        <div class="col-md-12"><label class="labels">Biography</label>
                            <textarea class="form-control" name="bio" id="" cols="24" rows="10"> <?php echo $_user->bio ?> </textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 border-primary align-self-center">
                <div class="mt-5 text-center"><button class="btn btn-primary " name="submit" type="submit">Update</button></div>
            </div>
        </form>
    <?php endif; ?>

<?php } else { ?>
    <div class="alert alert-danger my-3" role="alert">
        User required
    </div>
<?php } ?>




<?php
include_once('./resources/template/footer.html'); ?>