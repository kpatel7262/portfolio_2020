
<?php require '../includes/admin_header.php' ?>
<?php
require_once '../includes/Database.php';
require_once '../classes/Calorie.php';
?>

<?php

if(isset($_POST['addUsercalorie'])) {
    $username = $_POST['username'];
    $calorie = $_POST['calorie'];
    $message = $_POST['message'];


    $dbconn = Database::getDatabase();
    $c = new Calorie($dbconn);
    $count = $c->addcalorie($username, $calorie,$message);

    if($count){
        header("Location:list_caloriealerts_admin.php");
        //header("Location:calorie_alerts.php");
    } else {
        echo "Problem adding data";
    }
}
?>

<main>
    <form action="#" method="post">

        <div class="form-group">
            <label for="username">Name :</label>
            <input type="text" class="form-control" name="username" id="username" value=""
                   placeholder="Enter name"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="calorie">calorie :</label>
            <input type="text" name="calorie" class="form-control"
                   value="" id="calorie" placeholder="Enter calorie"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="message">message :</label>
            <input type="text" name="message" class="form-control"
                   value="" id="message" placeholder="Enter message"/>
            <span style="color: red">

            </span>
        </div>
        <a href="list_caloriealerts_admin.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addUsercalorie"
                class="btn btn-primary float-right" id="btn-submit">
            Add
        </button>
    </form>
</main>
<?php require '../includes/footer.php' ?>
