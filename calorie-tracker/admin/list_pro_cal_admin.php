<?php

require_once '../includes/Database.php';
require_once '../classes/Pro_Calorie.php';


/*gives list of all product calories*/
$dbconn = Database::getDatabase();
$pc = new Pro_Calorie($dbconn);
$Pro_Calorie = $pc->list_pro();

/*delete*/
if(isset($_POST["delete_pro"])){
    $id = $_POST["id"];
    $count = $pc->delete_pro($id);
    if($count){

        header("Location:list_pro_cal_admin.php");
    }
    else {
        echo " Error deleting Product Calorie!";
    }

}

include_once '../includes/admin_header.php';
?>

<main class="col-md-10 container">
    <p class="h1 text-center">Product Calorie</p>
    <div class="m-1">
        <!--    Displaying Data in Table-->
        <table class="table table-bordered tbl">
            <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Calorie</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($Pro_Calorie as $pc) {
            ?>
            <tr>
                <td><?= $pc->pro_name ;?></td>
                <td><?= $pc->pro_calorie ;?></td>
                <td>
                    <form action="update_pro_cal_admin.php" method="post">
                        <input type="hidden" name="id" value="<?= $pc->id; ?>"/>
                        <button type="submit" class="btn btn btn-dark" name="update_pro" id="update_pro">Update</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $pc->id; ?>"/>
                        <button type="submit" class="btn btn btn-dark" name="delete_pro" id="delete_pro">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="add_pro.php" id="add_pro" class="btn btn-secondary btn-lg">Add Product</a>

        
    </div>
</main>
<?php
require_once '../includes/footer.php';
?>
