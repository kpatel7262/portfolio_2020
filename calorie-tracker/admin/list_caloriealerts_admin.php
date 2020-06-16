<?php require '../includes/admin_header.php' ?>
<?php
require '../includes/Database.php';
require '../classes/Calorie.php';
?>
<?php
$dbconn = Database::getDatabase();
$c = new Calorie($dbconn);

$calorie = $c->listcalorie();
//$sql = "SELECT L.username as username,C.id as id,C.calorie as calorie FROM login L left join calorie_alert C on L.username = C.username";
if(isset($_POST["delete"])) {
    $id = $_POST["id"];
    $count = $c->deletecalorie($id);
    if ($count) {
        header("Location:list_caloriealerts_admin.php");
    } else {
        echo $c->msg();
    }
}
?>
    <main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="btn-sucess">Calorie data maintained Admin side</h2> <br>

                <a href="add_usercalorie_admin.php"><button class="btn btn-primary"> Insert User</button></a><br/>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover tbl">
                        <thead>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Calorie consumed</th>
                        <th>Message</th>
                        <th>send a message</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>

                        <?php   $counter = 0;
                        foreach($calorie as $c){$counter++;
                        ?>
                            <tr>
                                <th><?= $counter; ?></th>
<!--                                <th>--><?//= $c->id; ?><!--</th>-->
                                <td><?= $c->username; ?></td>
                                <td><?= $c->calorie; ?></td>
                                <td><?= $c->message; ?></td>
                                <td>

                                    <a  href="Send_caloriealerts_admin.php?id=<?= $c->id; ?>"/>
                                    <button class="btn btn-primary btn-sm" name="message"><span><i class="fa fa-envelope"></i> </span></button>
                                    </a>
<!--                                    <form action="Send_caloriealerts_admin.php?id" method="post">-->
<!--                                        <input type="hidden" name="id" value="--><?//= $c->id; ?><!--"/>-->
<!--                                        <a><button class="btn btn-primary btn-sm"  name="message"><span> <i class="fa fa-envelope"></i> </span></button></a>-->
<!--                                    </form>-->
                                </td>
                                <td>
                                    <form action="update_usercalorie_admin.php" method="post">
                                        <input type="hidden" name="id" value="<?= $c->id; ?>"/>
                                        <button class="btn btn-primary btn-sm" name="update"><span><i class="fa fa-edit"></i> </span></button>
                                    </form>
                                </td>

                                <td>
                                    <form action="list_caloriealerts_admin.php" method="post">
                                        <input type="hidden" name="id" value="<?= $c->id; ?>"/>
                                        <a><button class="btn btn-danger btn-sm"  name="delete"><span> <i class="fa fa-trash"></i> </span></button></a>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
<?php require '../includes/footer.php' ?>

