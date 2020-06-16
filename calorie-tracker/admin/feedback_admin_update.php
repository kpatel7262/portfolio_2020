<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/feedback.php';

$id1 = $email1 = $msg1 ="";
$dbconn = Database::getDatabase();
$f = new Feedback($dbconn);

$msg_err="";

    if(isset($_POST["update"])) {//to fetch and display data from the database
        $id1 = $_POST["id"];

        $sql = "select * from feedback where id=:id";
        $pdostm = $dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id1);
        $pdostm->execute();
        $feedback = $pdostm->fetch(PDO::FETCH_OBJ);

        $email1 = $feedback->email;
        $msg1 = $feedback->description;
        //echo $email1;
        //echo $msg1;
    }
    if(isset($_POST['updatebtn'])){
        //$email = $_POST['email'];
        $msg = $_POST['msg'];
        $id = $_POST['id'];

        if ($msg == "" || $msg == null) {//validating the feedback message
            $msg_err = "* Please enter some feedback/suggestion..";
        }

        else{
            $count = $f->updatefeedback($id, $msg);//calling update feedback from the Feedback class
            //for the selected feedback to update the feedback message given by the user
            if($count){
                header("Location:feedback_admin.php");
            }else{
                echo $f->msg();
            }
        }
     }
?>

<main>
    <h2>Admin is logged in...</h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id1;?>"/>
        <div class="form-group col-md-4">
            <label for="email">Email-id</label>
            <input type="text" readonly class="form-control" id="email" name="email" value="<?= $email1; ?>"/>
        </div>

        <div class="form-group col-md-4">
            <label for="msg">Feedback</label><span style="color:red;">* You can only edit the feedback message.</span>
            <input type="text" class="form-control" id="msg" name="msg" value="<?php
            if(isset($msg1)){
                echo $msg1;
            }
            ?>"/>
            <span style="color:red;"><?= $msg_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary" name="updatebtn">UPDATE</button>
            <a href="feedback_admin.php" class="btn btn-primary" name="back">BACK</a>
        </div>
    </form>
</main>

<?php require '../includes/footer.php';?>
