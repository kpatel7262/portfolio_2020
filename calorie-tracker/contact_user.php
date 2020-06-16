<?php
    require 'includes/header.php';
    require 'includes/Database.php';
    require 'classes/Contact.php';//calling the Contact class

    $fname_err = $lname_err = $gender_err = $phone_err = $email_err = $msg_err = "";
    $fname = $lname = $phone = $email = $msg =  $submit_msg = "";
    $gender = "";

    if(isset($_POST["submit"])) {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST['gender'];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $msg = $_POST["msg"];
       // echo $fname;

        $phoneRegEx = "/^[0-9]\d{10}$/";//regular expression for the phone
        //below statements are validating all the input fields
        if($fname == "" || $fname == null){
            $fname_err = "* Please enter your firstname..";
        }
        if($lname == "" || $lname == null){
            $lname_err = "* Please enter your lastname..";
        }
        if($gender == "" || $gender == null){
            $gender_err = "* Please enter your gender..";
        }


        if($phone == "" || $phone == null){
            $phone_err = "* Please enter your phone number..";
        }else if(!preg_match($phoneRegEx, $phone)){
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
            $dbconn = Database::getDatabase();//calling the database connection from the Database class
            $reply2 ="Please enter your reply..";
            $c = new Contact($dbconn);//sending database connection to the Contact Class
            //calling the addcontact function from the Contact Class
            $count = $c->addcontact($fname, $lname, $gender, $phone, $email, $msg, $reply2);

            if ($count) {
                header("Location: contact_user.php");
            } else {
                echo "Problem occurred in ..Please try later..";
            }
        }
    }
?>

<main>
    
    <form action="" method="post" class="container">
            <h2>We're always there to help you...</h2>
            <h4>Please fill the below asked details alongwith your query.</h4>
            <div class="form-group col-md-4">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php
                if(isset($fname)){
                    echo $fname;
                }
                ?>"/>
                <span style="color:red;"><?= $fname_err;?></span>
            </div>

            <div class="form-group col-md-4">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php
                if(isset($lname)){
                    echo $lname;
                }
                ?>" />
                <span style="color:red;"><?=$lname_err;?></span>
            </div>

        <div class="form-group col-md-4">
            <label for="gender">Gender</label><span> (male/female)</span>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php
            if(isset($gender)){
                echo $gender;
            }
            ?>" />

            <span style="color:red;"><?=$gender_err;?></span>
        </div>


        <div class="form-group col-md-4">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php
            if(isset($phone)){
                echo $phone;
            }
            ?>" />
            <span style="color:red;"><?= $phone_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="email">Email-id</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php
            if(isset($email)){
                echo $email;
            }
            ?>"/>
            <span style="color:red;"><?=$email_err;?></span>
        </div>

        <div class="form-group col-md-4">
            <label for="msg">Please write below your query</label>
            <textarea class="form-control" id="msg" rows="4" name="msg" value="<?php
            if(isset($msg)){
                echo $msg;
            }
            ?>"></textarea>
            <span style="color:red;"><?= $msg_err;?></span>
        </div>

        <div class="form-group col-md-4">
             <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
        </div>
    </form>
</main>

<?php require 'includes/footer.php'; ?>
