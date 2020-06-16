<?php

require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/Pro_Calorie.php';

$id_pc = $pro_name_pc = $pro_calorie_pc = "";

$dbconn = Database::getDatabase();
$pc = new Pro_Calorie($dbconn);

    if(isset($_POST['update_pro'])) {
        $id_pc = $_POST['id'];
        
        $sql = "SELECT * FROM products_calorie where id=:id";
        $pdostm = $dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id_pc);
        $pdostm->execute();
        $pro_calorie = $pdostm->fetch(PDO::FETCH_OBJ);

        $pro_name_pc = $pro_calorie->pro_name;
        $pro_calorie_pc = $pro_calorie->pro_calorie;
}

    if(isset($_POST['update_btn'])){
        $id = $_POST['id'];
        $pro_name = $_POST['pro_name'];
        $pro_calorie = $_POST['pro_calorie'];
        
        
        $count = $pc->update_pro($id, $pro_name, $pro_calorie);
        if($count){
            header("Location:list_pro_cal_admin.php");
        }   
            else{
                echo "Problem updating product calorie";
            }
    }
    


?>
<main class="container col-md-6">
    <!--update product calories-->
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id_pc; ?>" />
        <div class="form-group">
            <label for="pro_name">Product:</label>
            <input type="text" class="form-control" name="pro_name" id="pro_name" value="<?= $pro_name_pc; ?>" placeholder="Enter Product name" required>
        </div>
        <div class="form-group">
            <label for="pro_calorie">Calorie:</label>
            <input type="text" class="form-control" name="pro_calorie" id="pro_calorie" value="<?= $pro_calorie_pc; ?>" placeholder="Enter calories" required>
        </div>


        <a href="list_pro_cal_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>
        <button type="submit" name="update_btn" class="btn btn-secondary float-right" id="btn-submit">Update</button>
    </form>
</div>
</main>
<?php include '../includes/footer.php'?>