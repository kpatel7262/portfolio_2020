<?php require 'includes/header.php';
require_once 'includes/Database.php';
require 'admin/addnotification.php';

$db = Database::getDatabase();
$n = new addnotification();
$notification = $n->list_noti($db);
?>
<html>
    <head>
         <title>About Us</title>
    </head>
    <body>
        <!-- A user first be must loggedIn -->
        <!-- Intake notification will be sent via email but here it is just intake in shown in table -->
        <style rel="stylesheet" type="text/css" href="../styles/calorie_facts.css"></style>
        <p class="h1 text-center">Notifications</p>
        <div class="m-1">

            <!--    Displaying Data in Table-->
            <table class="table table-bordered tbl" >
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope ="col">Calories</th>
                    <th scope="col">Food</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Protein</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($notification as $n) {
                    ?>
                    <tr>

                        <td><?php echo $n->name; ?></td>
                        <td><?php echo $n->email; ?></td>
                        <td><?php echo $n->calories; ?></td>
                        <td><?php echo $n->food; ?></td>
                        <td><?php echo $n->quantity; ?></td>
                        <td><?php echo $n->protein; ?></td>


                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </body>
    <?php require 'includes/footer.php' ?>
