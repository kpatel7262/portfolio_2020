<?php
require_once '../includes/admin_header.php';
require_once '../includes/Database.php';
require_once '../classes/Pro_Calorie.php';


$pro_name = $pro_calorie ="";//variable to store input
$pro_name_err = $pro_calorie_err = "";//variable to store error

/*add product calorie*/
if(isset($_POST['add_pro'])){
    $pro_name = $_POST['pro_name'];
    $pro_calorie = $_POST['pro_calorie'];

    if($pro_name == "" || $pro_name == null){
        $pro_name_err = "*Please enter product...";
    }
    if($pro_calorie == "" || $pro_calorie == null){
        $pro_calorie_err = "*Please enter calorie...";
    }

    else{

        $dbconn = Database::getDatabase();
        $pc = new Pro_Calorie($dbconn);
        $count = $pc->add_pro($pro_name, $pro_calorie);

        if($count){
            header("Location: list_pro_cal_admin.php");
        } else {
            echo "Error occured adding Product Calorie";
        }
    }
}


?>

<main class="container col-md-6">

    <!--add product calorie-->
    <!-- <form action="" method="post">
        <div>
            <div  class="form-group">
                <label for="pro_name">Product :</label>
                <input type="text" name="pro_name" class="form-control" id="pro_name" value="" placeholder="Enter Product Name" required>
            </div>
            <div  class="form-group">
                <label for="pro_calorie">Calories :</label>
                <input type="text" class="form-control" id="pro_calorie" name="pro_calorie" value="" placeholder="Enter Calories" required>
            </div>
            <a href="list_pro_cal_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>

            <button type="submit" name="add_pro" id="add_pro" class="btn btn-secondary float-right" id="btn-submit">
                Add Fact
            </button>
        </div>
    </form> -->

    <form action="" method="post">
        
            <div  class="form-group">
                <label for="pro_name">Product :</label>
                <input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="Enter Product name: " value="<?php 
                if(isset($pro_name)){
                    echo $pro_name;
                }
                ?>">
                <span style="color:red;"><?= $pro_name_err ?></span> 
            </div>
            <div  class="form-group">
                <label for="pro_calorie">Calorie: </label>
                <input name="pro_calorie" class="form-control" id="pro_calorie" placeholder="Enter calories" value="<?php 
                if(isset($pro_calorie)){
                    echo $pro_calorie;
                }
                ?>">
                <span style="color:red;"><?= $pro_calorie_err ?></span>
            </div>

            <a href="list_pro_cal_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>

            <button type="submit" name="add_pro" id="add_pro" class="btn btn-secondary float-right">
                Add Product
            </button>
        
    </form>


</main>
<?php
require_once '../includes/footer.php';
?>