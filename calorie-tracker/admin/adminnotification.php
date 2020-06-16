<?php
require '../includes/admin_header.php';
require_once '../includes/Database.php';
require '../phpmailer/vendor/autoload.php';
require '../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'addnotification.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$nameErr = "";
$emailErr = "";
$calorieErr = "";
$foodErr = "";
$quantityErr = "";
$proteinErr = "";
if(isset($_POST['submit'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $calories = $_POST['user_calories'];
    $food = $_POST['user_food'];
    $quantity = $_POST['food_quantity'];
    $protein = $_POST['food_protein'];
    if ($name == "")
    {
        $nameErr = "Please enter name";
    }
    if ($email == "")
    {
        $emailErr = "Please enter email";
    }
    if($calories == "")
    {
        $calorieErr = "Please enter calorie";
    }
    if($food == "")
    {
        $foodErr = "Please enter food";
    }
    if($quantity == "")
    {
        $foodErr = "Please enter food";
    }
    if($protein == "")
    {
        $proteinErr = "Please enter protein value";
    }


    if ($name != "" && $email != "" && $food !="" && $calories != "" && $protein !="" && $quantity !="") {

        try {

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'patelkrishna.ca';
            $mail->SMTPAuth = true;
            $mail->Username = 'calorie_tracker@patelkrishna.ca';
            $mail->Password = 'calorie_tracker@2020';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Recipients
            $mail->setFrom('balmeetkaur52@gmail.com', 'Balmeet Kaur');
            $mail->addAddress($email, $name);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Calorie Intake..';
            $mail->Body = "You have to take ".$calories."calories.";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            $db = Database::getDatabase();
            $s = new addnotification();
            $count = $s->addNoti($name,$email,$calories,$food,$quantity,$protein, $db);
            header("Location:list_notification.php");
        } 
        
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>
<html>
    <head>
        <title>Admin Notification System</title>
    </head>
    <body>
    <form id="notification_form" method="post" action="#">
        <h1>Notification System</h1>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Name:</label>
                <input class="form-control" type="text" name="user_name" id="user_name" placeholder="Balmeet Kaur" value="<?php
                if(isset($name))
                {
                    echo $name;
                }?>">
                <span id="nameErr" style="color:red;"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-group col-md-4">
                <label>User Email:</label>
                <input class="form-control" type="email" name="user_email" id="user_email" placeholder="balmeetkaur52@gmail.com" value="<?php
                if(isset($email))
                {
                    echo $email;
                }?>">
                <span id="emailErr" style="color:red;"><?php echo $emailErr; ?></span>
            </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4">
            <label>Calories:</label>
            <input class="form-control" type="text" name="user_calories" id="user_calories" placeholder="3456" value="<?php
            if(isset($calories))
            {
                echo $calories;
            }?>">
            <span id="calorieErr" style="color:red;"><?php echo $calorieErr; ?></span>
        </div>
        <div class="form-group col-md-4">
            <label>Food:</label>
            <input class="form-control" type="text" name="user_food" id="user_food" placeholder="Rice" value="<?php
            if(isset($food))
            {
                echo $food;
            }?>">
            <span id="foodErr" style="color:red;"><?php echo $foodErr; ?></span>
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4">
            <label>Quantity:</label>
            <input class="form-control" type="text" name="food_quantity" id="food_quantity" placeholder="5kg" value="<?php
            if(isset($quantity))
            {
                echo $quantity;
            }?>">
            <span id="quantityErr" style="color:red;"><?php echo $quantityErr; ?></span>
        </div>
            <div class="form-group col-md-4">
                <label>Protein:</label>
                <input class="form-control" type="text" name="food_protein" id="food_protein" placeholder="50" value="<?php
                if(isset($protein))
                {
                    echo $protein;
                }?>">
                <span id="proteinErr" style="color:red;"><?php echo $proteinErr; ?></span>
            </div>

        </div>
        <p>
            <input type="submit" class="btn btn-primary" value="SendEmail" name="submit" id="send_notification">
        </p>
    </form>
    </body>
</html>
<?php require '../includes/footer.php' ?>
