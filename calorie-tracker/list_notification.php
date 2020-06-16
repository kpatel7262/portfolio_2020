<?php
require '../includes/admin_header.php';
require_once '../includes/Database.php';
require 'addnotification.php';

$db = Database::getDatabase();
$n = new addnotification();
$notification = $n->list_noti($db);

if(isset($_POST["delete_notification"])){
    $id = $_POST["id"];

    $count = $n->delete_notification($id,$db);
    if($count){

        header("Location:list_notification.php");
    }
    else {
        echo " Error found!";
    }

}
?>
<style rel="stylesheet" type="text/css" href="../styles/calorie_facts.css"></style>
<p class="h1 text-center">Notifications</p>
<div class="m-1">

    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl" >
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope ="col">Calories</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach($notification as $n) {
            ?>
            <tr>
                <td><?php echo $n->id;?></td>
                <td><?php echo $n->name; ?></td>
                <td><?php echo $n->email; ?></td>
                <td><?php echo $n->calories; ?></td>

                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $n->id; ?>"/>
                        <button type="submit" class="btn btn btn-dark" name="delete_notification" id="delete_notification">Delete</button>
                    </form>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="adminnotification.php" id="add_notification" class="btn btn-primary btn-lg">Add Notification</a>
<?php require '../includes/footer.php' ?>
