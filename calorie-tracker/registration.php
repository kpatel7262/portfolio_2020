<?php require 'includes/header.php' ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('includes/Database.php');
require_once('User.php');

//validation code............
$db = Database::getDatabase();
$user = new User();

$usernameerr = $emailiderr=  $password1err=  $password2err="" ;
$username = $emailid = $password1= $password2=  "";

if(isset($_POST['reg_user'])) {
	$userEnterStatus  = true;

    $username = $_POST['username'];
    $pattern = "/^[a-zA-Z]+$/";

    if ($username == "") {
        $usernameerr = "please enter username";
		$userEnterStatus = false;
    }
    else if (!preg_match($pattern,$username )){
        $usernameerr = "please enter only alphabetic";
		$userEnterStatus = false;
    }else{
      //  $usernameerr ="Valid username ";
    }
	
	$userExist = $user->checkUserName( $username  , $db);
	
	if($userExist == true){
		$usernameerr ="User Name Already Exists";
		$userEnterStatus = false;
	}
	

    $emailid = $_POST['emailid'];
    if($emailid == ""){
        $emailiderr =  "please enter email";
		$userEnterStatus = false;
    } else if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
        $emailiderr = "please enter valid email format";
		$userEnterStatus = false;
    } else {
       // $emailiderr = "Valid email";
    }

    $password1=$_POST['password_1'];

    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number    = preg_match('@[0-9]@', $password1);

    if((!$uppercase || !$lowercase || !$number || strlen($password1) < 8) ||  ($password1 == ""))
    {
        $password1err = "please enter password in valid formate use 1).special chracters
         2).uppercase letter 3).lowercase letter 4).numbers 5).Lengthshold me >8";
		$userEnterStatus = false;
    }else {
      //  $password1err = "Valid password ";
    }

    $password2=$_POST['password_2'];

    if(($password2=="") || (!($password1 == $password2))) {
        $password2err = "please enter correct password same as previous password";
		$userEnterStatus = false;
    }else{
      //  $password2err = "Valid password ";
    }
    // check database user already register
    //  now insert user
	if($userEnterStatus == true){
		
		 $user->addLoginEntry( $username, $emailid, $password1 , $db);
		// redirect to login page
		header("Location: userlogin.php?userenter=success");
	}
}

?>

<main>

    <div class="card bg-white">
        <div class="col-lg-5 m-auto">
            <div class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <form method="post" action="registration.php">


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input  name="username" class="form-control"  type="text" value="<?= $username; ?>" placeholder="Full name">
                        <span style="color: red"><?= $usernameerr; ?></span>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="emailid" class="form-control"   value="<?= $emailid; ?>" placeholder="Email address" type="email">
                        <span style="color: red"><?= $emailiderr; ?></span>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control"  value="<?= $password1; ?>" name="password_1" placeholder="Create password" type="password">
                        <span style="color: red"><?= $password1err; ?></span>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control"  value="<?= $password2; ?>" name="password_2" placeholder="Repeat password" type="password">
                        <span style="color: red"><?= $password2err; ?></span>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="reg_user"> Create Account  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Have an account? <a href="userlogin.php">Log In</a> </p>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require 'includes/footer.php' ?>

