<?php require 'includes/header.php' ?>
<?php require 'includes/Database.php';
require 'classes/Calorie.php';?>
<?php

$dbconn = Database::getDatabase();
//$c = new Calorie($dbconn);

session_start();

$username = $calorie=$message="";
$usernameerr = $calorieerr=$messageerr="";


$username = $_SESSION['username'];

    $id_c = $_GET["id"];


    $sql = "select * from calorie_alert where username=:username";
    $pdostm = $dbconn->prepare($sql);
    $pdostm->bindParam(':username', $username);
    $pdostm->execute();
    $calories = $pdostm->fetch(PDO::FETCH_OBJ);

//var_dump($calorie->message);
    $username = $calories->username;
    $calorie = $calories->calorie;
    $message = $calories->message;


if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pattern = "/^[a-zA-Z]+$/";
    $calorie = $_POST['calorie'];
    if ($username == "") {
        $usernameerr = "please enter username";
    } else if (!preg_match($pattern, $username)) {
        $usernameerr = "please enter valid username";
    }

    if ($calorie == "") {
        $calorieerr = "Please enter consumed calories per day";
    }

    if($username==true && $calorie==true){

        $dbconn = Database::getDatabase();
        $c = new Calorie($dbconn);
        $count = $c->addcalorie($username, $calorie, $message);
        if ($count) {
           // header("Location: calorie_alerts.php");
            header("Location: list_caloriealerts.php");
        } else {
            echo $c->msg();
        }
    }
}
//?>

    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card mt-5 bg-white">
                <h4 class="card-title mt-3 text-center">Daily Alerts for loggedin user</h4>
                <div class="card-body">
				
						<p><b>Message from admin</b> <q> <?php echo $calories->message;?></q></p>
						
                    <form method="post" action="calorie_alerts.php">

                        <div class="input-group-mb-3">
                            <div>
                                <input type="text" class="form-control" name="username" value="<?= $username; ?>" placeholder="User Name">
                                <span style="color: red"><?= $usernameerr; ?></span>
                            </div>
                            <br/>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" name="calorie"value="<?= $calorie; ?>" placeholder="enter consumed claories per day">
                                <span style="color: red"><?= $calorieerr; ?></span>
                            </div>
                            <br/>
                            <div class="input-group-mb-3">
                                <label for="message" name="message" value=""></label>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary float-right btn-block" value="submit" name="submit" id="submit">
                            </div>
                        </div><br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>


<?php require 'includes/footer.php' ?>