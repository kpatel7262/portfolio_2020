<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/Contact.php';//calling the Contact class

$fname_err = $lname_err = $gender_err = $phone_err = $email_err = $msg_err = "";
$fname = $lname = $phone = $email = $msg =  $submit_msg = "";
$gender = "";

$id1 = $fname1 = $lname1 = $gender1 = $phone1 = $email1 = $msg1 ="";
$dbconn = Database::getDatabase();//calling the database connection from the Database class
$c = new Contact($dbconn);//sending database connection to the Contact Class

    if(isset($_POST["update"])) {//fetching and displaying data from the database for the
                //selected contact
        $id1 = $_POST["id"];

        $sql = "select * from contact where id=:id";
        $pdostm = $dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id1);
        $pdostm->execute();
        $feedback = $pdostm->fetch(PDO::FETCH_OBJ);

        $fname1 = $feedback->fname;
        $lname1 = $feedback->lname;
        $gender1 = $feedback->gender;
        $phone1 = $feedback->phone;
        $email1 = $feedback->email;
        $msg1 = $feedback->message;
    }
    if(isset($_POST['updatebtn'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        $id = $_POST['id'];

        $phoneRegEx = "/^[0-9]\d{10}$/";//regular expression for the phone input
        //below statements validates all the input fields
        if ($fname == "" || $fname == null) {
            $fname_err = "* Please enter the firstname..";
        }
        if ($lname == "" || $lname == null) {
            $lname_err = "* Please enter the lastname..";
        }
        if ($gender == "" || $gender == null) {
            $gender_err = "* Please enter the gender..";
        }
        if ($phone == "" || $phone == null) {
            $phone_err = "* Please enter the phone number..";
        } else if (!preg_match($phoneRegEx, $phone)) {
            $phone_err = "* Please enter a 10-digit contact number..";
        }
        if ($email == "" || $email == null) {
            $email_err = "* Please enter the email..";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "* Please enter the correct format of the email..";
        }
        if ($msg == "" || $msg == null) {
            $msg_err = "* Please enter some message..";
        }

        else {
            //calling updatecontact from the Contact class toupdate the details of the
            //selected contact
            $count = $c->updatecontact($id, $fname, $lname, $gender, $phone, $email, $msg);
            if ($count) {
                header("Location:contact_admin.php");
            } else {
                echo $c->msg();
            }
        }
    }
?>

<main>
    <h2>Admin is logged in...</h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id1;?>"/>
        <div class="form-group col-md-4">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php
            if(isset($fname1)){
                echo $fname1;
            }
            ?>"/>
            <span style="color:red;"><?= $fname_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?= $lname1;?>" />
            <span style="color:red;"><?=$lname_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?= $gender1;?>" />
            <span style="color:red;"><?=$gender_err;?></span>
        </div>


        <div class="form-group col-md-4">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $phone1;?>" />
            <span style="color:red;"><?= $phone_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="email">Email-id</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $email1;?>"/>
            <span style="color:red;"><?=$email_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="msg">Client's query</label>
            <input type="text" class="form-control" id="msg" name="msg" value="<?= $msg1;?>"/>
            <span style="color:red;"><?= $msg_err;?></span>
        </div>

        <div class="form-group col-md-4" style="display:inline;">
            <button type="submit" class="btn btn-primary" name="updatebtn">UPDATE</button>
            <a href="contact_admin.php" class="btn btn-primary" name="back">BACK</a>
        </div>
    </form>
</main>

<?php require '../includes/footer.php';?>

