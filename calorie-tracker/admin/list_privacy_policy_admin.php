<?php

require_once '../includes/Database.php';
require_once '../classes/Privacy_Policy.php';


/*gives list of all policy*/
$dbconn = Database::getDatabase();
$p = new privacy_policy($dbconn);
$privacy_policy = $p->list_privacy_policy();

/*delete policy*/
if(isset($_POST["delete_privacy_policy"])){
    $id = $_POST["id"];
    $count = $p->delete_privacy_policy($id);
    if($count){

        header("Location:list_privacy_policy_admin.php");
    }
    else {
        echo " Error found!";
    }

}

include_once '../includes/admin_header.php';
?>

<main class="col-md-10 container">
<p class="h1 text-center">Privacy Policy</p>
<div class="m-1">
    
    <!--Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            
            <th scope="col">Information</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($privacy_policy as $p) {
        ?>
        <tr>
            <td><?= $p->policy_question ;?></td>
            <td><?= $p->policy_answer ;?></td>
            

            <td>
                <form action="update_privacy_policy_admin.php" method="post">
                    <input type="hidden" name="id" value="<?= $p->id; ?>"/>
                    <button type="submit" class="btn btn btn-dark" name="update_privacy_policy" id="update_privacy_policy">Update</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $p->id; ?>"/>
                    <button type="submit" class="btn btn btn-dark" name="delete_privacy_policy" id="delete_privacy_policy">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="add_privacy_policy.php" id="add_privacy_policy" class="btn btn-secondary btn-lg">Add Policy Information</a>

    
</div>
</main>
<?php
require_once '../includes/footer.php';
?>