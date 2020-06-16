<?php
use PHPMailer\PHPMailer\PHPMailer;//calling the namespace PHPMailer
use PHPMailer\PHPMailer\Exception;//calling the namespace PHPMailer to call its exception functionality
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/Contact.php';//calling the Contact class

require '../phpmailer/vendor/autoload.php';

$id1 = $fname1 = $lname1 = $email1 = $msg1 = $reply1 = $reply_err = "";
$dbconn = Database::getDatabase();//calling the database connection from the Database class
$c = new Contact($dbconn);//sending database connection to the Contact Class

if(isset($_POST["reply"])) {//fetching and displaying data from the database for the
    //selected contact
    $id1 = $_POST["id"];

    $sql = "select * from contact where id=:id";//selecting the conatct details for the selected id
    $pdostm = $dbconn->prepare($sql);
    $pdostm->bindParam(':id', $id1);
    $pdostm->execute();
    $feedback = $pdostm->fetch(PDO::FETCH_OBJ);

    $fname1 = $feedback->fname;
    $lname1 = $feedback->lname;
    $email1 = $feedback->email;
    $msg1 = $feedback->message;
    $reply1 = $feedback->reply;
}

if(isset($_POST['replybtn'])) {//to send reply to the selected user via email
    $reply = $_POST['reply'];

     if($reply == "" || $reply == null){//validating the reply functionality
         $reply_err = "* Please enter the reply message..";
     }
    $id = $_POST['id'];

    $count = $c->updatecontact2($id, $reply);//calling the updatecontact2 function from the Contact class
            // to update the reply of the selected contact
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'patelkrishna.ca';//setting the host as gmail
    $mail->SMTPAuth = true;//setting the authorization to true
    $mail->Username = 'calorie_tracker@patelkrishna.ca';//email address of the sender
    $mail->Password = 'calorie_tracker@2020';//password of the sender's account
    $mail->SMTPSecure = 'tls';//setting encryption type
    $mail->Port = 587;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom('goyalshikha117@gmail.com', 'Shikha Goyal');//email address of the sender
    $mail->addAddress($email1, $fname1);//email address and the firstname of the recipient

    $mail->Subject = 'Reply to your Query';//subject message
    $replyMsg = "Your query :" . $msg1 . "<br/>Reply :" . $reply;//content to be send
    $mail->Body = $replyMsg;
    $mail->AltBody = strip_tags($replyMsg);
    $mail->isHTML(true);              // Enable HTML

    if (!$mail->send()) {
        throw new Exception('Error sending email: ' .
            htmlspecialchars($mail->ErrorInfo));//send an error if email is not send
    } else {
        $mail->send();
        header("Location:contact_admin.php");//if email is send redirect to the conatact_admin.php
    }
}
?>

<main>
    <h2>Admin is logged in...</h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id1;?>"/>
        <div class="form-group col-md-4">
            <label for="fname">First Name</label>
            <input type="text" readonly class="form-control" id="fname" name="fname" value="<?= $fname1;?>"/>
        </div>

        <div class="form-group col-md-4">
            <label for="lname">Last Name</label>
            <input type="text" readonly class="form-control" id="lname" name="lname" value="<?= $lname1;?>" />
        </div>

        <div class="form-group col-md-4">
            <label for="email">Email-id</label>
            <input type="text" readonly class="form-control" id="email" name="email" value="<?= $email1;?>"/>
        </div>

        <div class="form-group col-md-4">
            <label for="msg">Client's Query</label>
            <input type="text" readonly class="form-control" id="msg" name="msg" value="<?= $msg1;?>"/>
        </div>

            <div class="form-group col-md-4">
                <label for="reply">Reply to client's query</label>
                <input type="text" class="form-control" id="reply" name="reply" value="<?php
                if(isset($reply1)){
                    echo $reply1;
                }
                ?>"/>
                <span style="color:red;"><?= $reply_err;?></span>
            </div>

        <div class="form-group col-md-4" style="display:inline;">
            <a href="contact_admin.php" class="btn btn-primary" name="back">BACK</a>

            <button type="submit" class="btn btn-primary" name="replybtn">Reply</button>
            <span style="color:red;">* You only type the reply message whereas the other fields remain static.</span>

        </div>

    </form>
</main>

<?php require '../includes/footer.php';?>


