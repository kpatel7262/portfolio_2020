<?php require '../includes/admin_header.php' ?>
<?php
require_once('../includes/Database.php');

$dbcon = Database::getDatabase();
?>
<?php
//use Model\Database;
//use Model\User;
//
//require_once '../Model/Database.php';
//require_once '../Model/User.php';
//
////
//if(isset($_POST['addUser'])) {
//    $username = $_POST['username'];
//    $emailid = $_POST['emailid'];
//    $password = $_POST['password'];
//
//
//    $dbcon = Database::getDb();
//
//    $u = new User($dbcon);
//
//    $count = $u->addUser($username, $emailid, $password);
//
//
//    if($count){
//        header("Location: list_user_admin.php");
//    } else {
//        echo "problem adding a user";
//    }
//}
//to find an error
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//
if(isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (username, emailid, password)
              VALUES (:username, :emailid, :password) ";
    $pst = $dbcon->prepare($sql);

    $pst->bindParam(':username', $username);
    $pst->bindParam(':emailid', $emailid);
    $pst->bindParam(':password', $password);


    $count = $pst->execute();

    if($count){
        header("Location: list_user_admin.php");
    } else {
        echo "problem adding a user";
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
            <label for="emailid">Email :</label>
            <input type="text" class="form-control" id="emailid" name="emailid"
                   value="" placeholder="Enter email"/>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" class="form-control"
                   value="" id="password" />
            <span style="color: red">

            </span>
        </div>
        <a href="list_user_admin.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addUser"
                class="btn btn-primary float-right" id="btn-submit">
            Add user
        </button>
    </form>
</main>
<?php require '../includes/footer.php' ?>
