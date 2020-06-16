<?php
require '../includes/admin_header.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../includes/Database.php';
require '../classes/Calorie.php';
?>
<?php


$id_c = $username_c= $calorie_c = $message_c = "";
$dbconn = Database::getDatabase();
$c = new Calorie($dbconn);


if(isset($_POST["update"])) {
    $id_c = $_POST["id"];

    $sql = "select * from calorie_alert where id=:id";
    $pdostm = $dbconn->prepare($sql);
    $pdostm->bindParam(':id', $id_c);
    $pdostm->execute();
    $calorie = $pdostm->fetch(PDO::FETCH_OBJ);

    $username_c = $calorie->username;
    $calorie_c = $calorie->calorie;
    $message_c = $calorie->message;

}
if(isset($_POST['updatebtn'])){
    $username = $_POST['username'];
    $calorie = $_POST['calorie'];
    $message = $_POST['message'];
    $id = $_POST['id'];

    $count = $c->updatecalorie($id, $username, $calorie, $message);
    if($count){
        header("Location:list_caloriealerts_admin.php");
    }
    else{
        echo $c->msg();
    }
}
?>

    <main>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id_c;?>"/>
            <div class="form-group col-md-4">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $username_c;?>"/>

            </div>

            <div class="form-group col-md-4">
                <label for="calorie">Calorie</label>
                <input type="text" class="form-control" id="calorie" name="calorie" value="<?= $calorie_c;?>" />

            </div>

            <div class="form-group col-md-4">
                <label for="message">Message</label>
                <input type="text" class="form-control" id="message" name="message" value="<?= $message_c;?>" />

            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary" name="updatebtn">UPDATE</button>
            </div>
        </form>
    </main>

<?php require '../includes/footer.php';?>

<?php
