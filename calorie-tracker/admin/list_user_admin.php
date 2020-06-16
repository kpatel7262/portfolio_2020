<?php require '../includes/admin_header.php' ?>
<?php
require_once('../includes/Database.php');

$dbcon = Database::getDatabase();
?>

<?php

$sql = "SELECT * FROM login";
$pdostm = $dbcon->prepare($sql);
$pdostm->execute();

$users = $pdostm->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="btn-sucess">Registered user's details in Admin side</h2> <br />
<!--            <div class="input-group">-->
<!--                <input type="text" class="form-control-block" placeholder="Search by name">-->
<!--                <div class="input-group-btn">-->
<!--                    <button class="btn btn-default" type="submit">-->
<!--                        <i class="fa fa-search"></i>-->
<!--                    </button>-->
<!--                </div>-->
            </div>
            <a href="add_user_admin.php"><button class="btn btn-primary"> Insert User</button></a><br/>
            <table class="table table-bordered tbl">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Emailid</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                </thead>
                <tbody>
                <?php
                $counter = 0;
                foreach ($users as $key=> $user) { $counter++; ?>
                    <tr>
                        <th><?= $counter; ?></th>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['emailid'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td>

                            <a  href="update_user_admin.php?id=<?= $user['id'] ?>"/>
                            <button class="btn btn-primary btn-sm"><span><i class="fa fa-edit"></i> </span></button>
                            </a>

                        </td>
                        <td>
                            <form action="delete_user_admin.php" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>"/>
                                <a><button class="btn btn-danger btn-sm" ><span> <i class="fa fa-trash"></i> </span></button></a>

                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!--                </div>-->
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?>
