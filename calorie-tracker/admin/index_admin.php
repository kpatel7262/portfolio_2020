<?php

require "../includes/admin_header.php";
require '../includes/Database.php';


$dbconn = Database::getDatabase();//calling the database connection from the Database class


?>
<!--main area starts here-->
<main>
    <br/>
    <div class="content">
        <div class="form-group col-md-8">
            <h2>Administrative Account</h2>
            <p>Welcome to the administrative account, Hence you can make changes to the website.</p>
            <br/>
        </div>

        <div class="form-group col-md-8">
            <h2>Calorie Tracker</h2>
            <p>Calorie tracker will help you to maintain your diet and a healthy life. It will work as your personal dietician who will be always there with you in all your needs. It will also remind you and motivate you to your path. </p>
            <p>This application will enable a registered user to log-in and send him intake notifications on daily basis.</p>
            <p>Also non-logged-in users can check the total calories from a list of products with their amounts.</p>
            <br/>
        </div>
        <br/>
    </div>
</main>

<?php
require "../includes/footer.php" ;
?>
