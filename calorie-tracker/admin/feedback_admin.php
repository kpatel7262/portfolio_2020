<?php
    require '../includes/admin_header.php';
    require '../includes/Database.php';
    require '../classes/feedback.php';//including the Feedback class

    $dbconn = Database::getDatabase();//calling database connection from database class
    $f = new Feedback($dbconn);//sending database connection to Feedback class

    $feedback = $f->listfeedback();//calling list feedback function from Feedback class

    if(isset($_POST["delete"])){
        $id = $_POST["id"];

        $count = $f->deletefeedback($id);//calling delete feedback function from Feedback class
                //to delete the selected feedback from the admin side
        if($count){
            header("Location:feedback_admin.php");
        }else{
            echo $f->msg();
        }
    }

    if(isset($_POST['postbtn'])){
        $msg = "ON";
        $id = $_POST['id'];

            $count = $f->updatestatus($id, $msg);//calling updatestatus feedback function from Feedback class
        //to update the status as ON of selected feedback from the admin side to post it on the home page
            if($count){
                header("Location:feedback_admin.php");
            }else{
                echo $f->msg();
            }
    }
    if(isset($_POST['unpostbtn'])){
        $msg = "OFF";
        $id = $_POST['id'];

            $count = $f->updatestatus($id, $msg);//calling updatestatus feedback function from Feedback class
        //to update the status as OFF of selected feedback from the admin side to unpost it from the home page
            if($count){
                header("Location:feedback_admin.php");
            }else{
                echo $f->msg();
            }
    }
?>

<main>
    <h2>Admin is logged in...</h2>

    <form action="feedback_admin_search.php" method="post">
        <label for="emailsearch">SEARCH:</label>
        <input type="text" id="emailsearch" name="emailsearch" value="<?php
        if(isset($emailsearch)){
            echo $emailsearch;
        }
        ?>"/>
        <button type="submit" class="btn btn-primary" name="searchbtn">SEARCH</button>
    </form><br/>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">EMAIL-ID</th>
            <th scope="col">FEEDBACK</th>
            <th scope="col">ACTION 1</th>
            <th scope="col">ACTION 2</th>
            <th scope="col">ACTION 3</th>
            <th scope="col">UNPOST</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($feedback as $f){?>
            <tr>
                <td><?= $f->id;?></td>
                <td>
                    <form action="feedback_admin_search.php" method="post">
                        <input type="hidden" name="emailsearch" value="<?= $f->email;?>"/>
                        <button type="submit" class="btn btn-link" name="searchbtn"><?= $f->email;?></button>
                    </form>
                </td>
                <td><?= $f->description;?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $f->id;?>"/>
                        <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
                    </form>
                </td>
                <td>
                    <form action="feedback_admin_update.php" method="post">
                        <input type="hidden" name="id" value="<?= $f->id;?>"/>
                        <button type="submit" class="btn btn-warning" name="update">UPDATE</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $f->id;?>"/>
                        <button type="submit" class="btn btn-primary" name="postbtn">POST</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $f->id;?>"/>
                        <button type="submit" class="btn btn-primary" name="unpostbtn">UNPOST</button>
                    </form>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</main>

<?php require '../includes/footer.php';?>