<?php require '../includes/admin_header.php' ?>

<?php
require_once('../includes/Database.php');

$dbcon = Database::getDatabase();


//http://localhost/UpdatedProject/project-repo-codingcrashers-master/html-css/pages/updateuser.php

$username = $emailid = $password= "";

//if(isset($_POST['updateUser'])){
$id= $_GET['id'];
//databse connection


$sql = "SELECT * FROM login where id = :id";

$pst = $dbcon->prepare($sql);
$pst->bindParam(':id', $id);
$pst->execute();
$user = $pst->fetch(PDO::FETCH_OBJ);

$username =  $user->username;
$emailid = $user->emailid;
$password = $user->password;



//}
if(isset($_POST['updateUser'])) {
    $username = $_POST['username'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $id = $_POST['uid'];

    $sql = "Update login
                set username = :username,
                emailid = :emailid,
                password= :password
                WHERE id = :id
        
        ";

    $pst =   $dbcon->prepare($sql);

    $pst->bindParam(':username', $username);
    $pst->bindParam(':emailid', $emailid);
    $pst->bindParam(':password', $password);
    $pst->bindParam(':id', $id);

    $count = $pst->execute();

    if($count){
        header("Location: list_user_admin.php");
    } else {

        echo "problem updating a user with error ";
        var_dump($pst->errorInfo());
    }
}

?>


<div>
    <!--    Form to Update  Student -->
    <form action="" method="post">
        <input type="hidden" name="uid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $username; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="emailid" name="emailid"
                   value="<?= $emailid; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="password">password :</label>
            <input type="password" name="password" value="<?= $password; ?>" class="form-control"
                   id="password">
            <span style="color: red">

            </span>
        </div>
        <a href="list_user_admin.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updateUser"
                class="btn btn-primary float-right" id="btn-submit">
            Update User
        </button>
    </form>
</div>
<?php require '../includes/footer.php' ?>
