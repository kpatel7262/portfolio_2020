<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/feedback.php';?><!--including the Feedback class-->

<main>

    <?php
    $dbconn = Database::getDatabase();//calling database connection
    $f = new Feedback($dbconn);//sending database connection to the Feedback class

    if (isset($_POST['searchbtn'])) {
        $email = $_POST["emailsearch"];
        echo "<h3>Feedback Details of ".$email."</h3>";
        // echo $name;
        $feedback = $f->searchfeedback($email);//calling the search feedback function from the Feedback class
                //forthe selected or the entered email id
        //var_dump($co);
        foreach ($feedback as $c2) {//to display associative array
            foreach ($c2 as $key => $value) {
                echo $key . ": " . $value . "<br/>";
            }
        }
    }
    ?>
    <br/>
    <form action="feedback_admin.php" method="post">
        <button type="submit" class="btn btn-primary" name="back">BACK</button>
    </form>

</main>

<?php require '../includes/footer.php'; ?>
