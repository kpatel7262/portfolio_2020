<?php require '../includes/admin_header.php' ?>
<?php
////use Model\Database;
////use Model\User;
//
//require_once '../Model/Database.php';
//require_once '../Model/User.php';
//
//if(isset($_POST['id'])){
//    $id = $_POST['id'];
//    $db = Database::getDb();
//
//    $s = new User();
//    $count = $s->deleteUser($id, $db);
//    if($count){
//        header("Location: list_user_admin.php");
//    }
//    else {
//        echo " problem deleting";
//    }
//
//
//}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
//databse connection
    $user = 'calorieUser';
    $password = 'calorie@123';
    $dbname = 'calorie_tracker';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);


    $sql = "DELETE FROM login WHERE id = :id";

    $pst = $dbcon->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    if ($count) {
        header("Location: list_user_admin.php");
    } else {
        echo " problem deleting";
    }


}

?>
<?php require '../includes/footer.php' ?>
