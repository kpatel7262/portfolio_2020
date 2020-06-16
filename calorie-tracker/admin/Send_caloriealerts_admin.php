<?php require '../includes/admin_header.php' ?>
<?php require_once '../includes/Database.php';
require_once '../classes/Calorie.php';
 $dbconn = Database::getDatabase();
    
	$id_c = $_GET["id"]; 

if(isset($_GET["id"])) {
	


    $sql = "select * from calorie_alert where id=:id";
    $pdostm = $dbconn->prepare($sql);
    $pdostm->bindParam(':id', $id_c);
    $pdostm->execute();
    $calorie = $pdostm->fetch(PDO::FETCH_OBJ);

    $username = $calorie->username;
    $calorie = $calorie->calorie;
    $message = $calorie->message;

}



if(isset($_POST['sendMsg'])) {
    $username = $_POST["username"];
    $calorie = $_POST["calorie"];
    $message = $_POST["message"];

   
    $c = new Calorie($dbconn);
	
    $count = $c->addcalorieMessage($username, $calorie,$message , $id_c);
	
	var_dump($count);

    if($count){
        header("Location:list_caloriealerts_admin.php");
        //header("Location:calorie_alerts.php");
    } else {
        echo "Problem adding data";
    }

}

?>
    <main>
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card mt-5 bg-white">
                <div class="card-body">
                    <form name="frmNotification" id="frmNotification" action="" method="post" >
<!--                    <form method="post" action="list_caloriealerts_admin.php">-->
                            <input type="hidden" name="id" value="<?= $id;?>"/>
                            <div class="form-group col-md-4">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $username;?>"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="calorie">Calorie</label>
                                <input type="text" class="form-control" id="calorie" name="calorie" value="<?= $calorie;?>" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="message">Message</label>
                                <input type="text" class="form-control" id="message" name="message" value="<?= $message;?>" />
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary" name="sendMsg">Send Message</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require '../includes/footer.php' ?>
