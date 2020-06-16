<?php require 'includes/header.php' ?>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('includes/Database.php');
require_once('User.php');

$db = Database::getDatabase();
$user = new User();

//validation code............
session_start();
$usernameerr =  $passworderr= "" ;
$username  = $password=  "";

if(isset($_POST['login_user']))
{
    $userEnterStatus  = true;

    $username = $_POST['username'];
    $pattern = "/^[a-zA-Z]+$/";

    if ($username == "") {
        $usernameerr = "please enter username";
    } else if (!preg_match($pattern, $username)) {
        $usernameerr = "please enter valid username";
        $userEnterStatus = false;
    } else {
        $userEnterStatus = false;
    }
    $password = $_POST['password'];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if ((!$uppercase || !$lowercase || !$number || strlen($password) < 8) || ($password == "")) {
        $passworderr = "please enter password in valid formate use 1).special chracters
         2).uppercase letter 3).lowercase letter 4).numbers 5).Lengthshold me >8";
        $userEnterStatus = false;
    } else {
        $userEnterStatus = false;
    }

    //redirect to the  admin page
    $dbuser = 'admin';
    $dbpass = 'admin';
    $userExist = $user->checkUserName( $username  , $db);
    $AuthenticateUser = $user->AuthenticateUser( $username  , $password, $db);
    //create a session if user exist
    if($userExist == true && $AuthenticateUser == true){
        $userEnterStatus = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:index.php");
    }
    else if($username == $dbuser && $password == $dbpass){
        $_SESSION['username'] = $dbuser;
        $_SESSION['password'] = $dbpass;
        header('Location:admin/index_admin.php');
    } else {
        //echo "Invalid Login Credentials";
        $usernameerr ="User is not registered please do registration";
    }
}

?>
    <main>
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5 bg-white">
                    <h4 class="card-title mt-3 text-center">Login Page</h4>
                    <div class="card-title text-center mt-3">
                        <img src="images/login.jpg" width="150px" height="100px">
                    </div>
                    <div class="card-body">
                        <form method="post" action="userlogin.php">
                            <div class="input-group-mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-2x"></i>
                            </span>
                                    <input type="text" class="form-control" name="username" value="<?= $username; ?>" placeholder="User Name">
                                    <span style="color: red"><?= $usernameerr; ?></span>
                                </div>
                            </div><br/>
                            <div class="input-group-mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-2x"></i>
                            </span>
                                    <input type="password" class="form-control" name="password" value="<?= $password; ?>" placeholder="Password">
                                    <span style="color: red"><?= $passworderr; ?></span>
                                </div>
                            </div><br/>

                            <button class="btn btn-primary btn-block" type="submit"  name="login_user">Login</button>
                            <p class="text-black text-center mt-2">You don't have a account ?</p>

                            <div class="form-group ">
                                <p class="text-center"><a href="registration.php">Create an account</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php require 'includes/footer.php' ?>