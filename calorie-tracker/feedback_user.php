<?php
    require 'includes/header.php';
    require 'includes/Database.php';
    require 'classes/feedback.php';

    $email_err = $msg_err = "";//variables to store error messages
    $email = $msg = "";//variables to store data

    if(isset($_POST["submit"])) {//If submit button is closed via POST method

        $email = $_POST["email"];
        $msg = $_POST["msg"];
        //echo $email;
        //validating both the email and the feedback message fields before entering data in the database
        if ($email == "" || $email == null) {
            $email_err = "* Please enter the email..";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "* Please enter the correct format of the email..";
        }
        if ($msg == "" || $msg == null) {
            $msg_err = "* Please enter some feedback/suggestion..";
        }
        
        else {
            //echo $email;
            $dbconn = Database::getDatabase();//calling the database connection
            $f = new feedback($dbconn);//sending the database connection to the Feedback class
            //var_dump($f);
            $post1 = "OFF";
            $count = $f->addfeedback($email, $msg, $post1);//calling the addfeedback function from the Feedback class
            //var_dump($count);
            if ($count) {
                header("Location: feedback_user.php");
            } else {
                echo "Problem in adding feedback, Please try again later..";
            }
        }
    }
?>

<main>
    <h2>Your feedback is valuable to improve our services..</h2>
    <p>We will be highly obliged if you could spend 2minutes to give us your feedback.</p>
    <P>Please enter your email-id and feedback /suggestion you which to post..</P>
         <form action="" method="post">

                <div class="form-group col-md-4">
                    <label for="email">Email-id</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="xyz@example.com" value="<?php
                        if(isset($email)){
                            echo $email;
                        }
                    ?>"/>
                    <span style="color:red;"><?= $email_err;?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="msg">Feedback</label>
                    <textarea class="form-control" id="msg" name="msg" rows="4" placeholder="Please enter your feedback/suggestion which can help us improve in a better way..." value="<?php
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

<?php
     require 'includes/footer.php';
?>