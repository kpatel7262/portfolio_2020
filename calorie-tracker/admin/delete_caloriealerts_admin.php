<?php require '../includes/admin_header.php' ?>
<?php

require_once('../includes/Database.php');

$dbcon = Database::getDatabase();

?>
<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
//databse connection



    $sql = "DELETE FROM calorie_alert WHERE id = :id";

    $pst = $dbcon->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    if ($count) {
        header("Location: list_caloriealerts_admin.php");
    } else {
        echo " problem deleting";
    }


}
?>
<?php require '../includes/footer.php' ?>
