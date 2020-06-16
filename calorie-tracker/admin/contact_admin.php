<?php
    require '../includes/admin_header.php';
    require '../includes/Database.php';
    require '../classes/Contact.php';//calling the Contact class

    $dbconn = Database::getDatabase();//calling the database connection from the Database class
    $c = new Contact($dbconn);//sending database connection to the Contact Class
    $replied = "REPLY";

    $contact = $c->listcontact();//calling listcontact function from the Contact class to display the
        //entire Contact table data

    if(isset($_POST["delete"])){
        $id = $_POST["id"];
        $count = $c->deletecontact($id);//calling deletecontact function from the Contact class
            //to delete the selected contact
        if($count){
            header("Location:contact_admin.php");
        }else{
            echo $c->msg();
        }
    }
    if(isset($_GET["replybtn"])){//to change the reply button to replied after the admin
                //has replied to the user via email technology
        $replied = "REPLIED";
    }
?>

<main>
    <h2>Admin is logged in...</h2>
    <br/>

    <form action="contact_admin_search.php" method="post">
        <label for="namesearch">SEARCH:</label>
        <input type="text" id="namesearch" name="namesearch" value="<?php
        if(isset($namesearch)){
            echo $namesearch;
        }
        ?>"/>
        <button type="submit" class="btn btn-primary" name="searchbtn">SEARCH</button>
    </form><br/>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">LAST NAME</th>
                <th scope="col">GENDER</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">EMAIL-ID</th>
                <th scope="col">MESSAGE</th>
                <th scope="col">ACTION 1</th>
                <th scope="col">ACTION 2</th>
                <th scope="col">ACTION 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($contact as $c){
                ?>
                <tr>

                    <td><?= $c->id;?></td>
                    <td>
                        <form action="contact_admin_search.php" method="post">
                            <input type="hidden" name="namesearch" value="<?= $c->fname;?>"/>
                            <button type="submit" class="btn btn-link" name="searchbtn"><?= $c->fname;?></button>
                        </form>
                    </td>
                    <td><?= $c->lname;?></td>
                    <td><?= $c->gender;?></td>
                    <td><?= $c->phone;?></td>
                    <td><?= $c->email;?></td>
                    <td><?= $c->message;?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $c->id;?>"/>
                            <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
                        </form>
                    </td>
                    <td>
                        <form action="contact_admin_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $c->id;?>"/>
                            <button type="submit" class="btn btn-warning" name="update">UPDATE</button>
                        </form>
                    </td>
                    <td>
                        <form action="contact_admin_reply.php" method="post">
                            <input type="hidden" name="id" value="<?= $c->id;?>"/>
                            <button type="submit" class="btn btn-primary" name="reply"><?php echo $replied;?></button>
                        </form>
                    </td>
                </tr>
            <?php  }?>

        </tbody>
    </table>
</main>

<?php require '../includes/footer.php'; ?>
