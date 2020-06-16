<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/Contact.php';//calling the Contact class?>

<main>

<?php
$dbconn = Database::getDatabase();//calling the database connection from the Database class
$c = new Contact($dbconn);//sending database connection to the Contact Class

    if (isset($_POST['searchbtn'])) {
        $name = $_POST["namesearch"];
        echo "<h3>Contact Details of ".$name."</h3>";
       // echo $name;
        $co = $c->searchcontact($name);//calling searchcontact function from the Contact class
        //to search the selected contact/inserted in the search bar
        //var_dump($co);
        foreach ($co as $c2) {//displaying the associative array
            foreach ($c2 as $key => $value) {
                echo $key . ": " . $value . "<br/>";
            }
        }
    }
?>
<br/>
<form action="contact_admin.php" method="post">
<button type="submit" class="btn btn-primary" name="back">BACK</button>
</form>

</main>

<?php require '../includes/footer.php'; ?>
