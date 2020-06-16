<?php

    require_once '../includes/Database.php';
    require_once '../classes/facts.php';
    define("ROW_PER_PAGE",1);

    /*gives list of facts*/
    $dbconn = Database::getDatabase();
    $f = new facts($dbconn);
    $fact = $f->list_facts();

    /*delete fact*/
    if(isset($_POST["delete_fact"])){
        $id = $_POST["id"];

        $count = $f->delete_fact($id);
        if($count){

            header("Location:list_facts_admin.php");
        }
        else {
            echo " Error found!";
        }

    }

    include_once '../includes/admin_header.php';
    ?>
    <style rel="stylesheet" type="text/css" href="../styles/calorie_facts.css"></style>
    <main class="col-lg-10">
        <p class="h1 text-center">Calorie Facts</p>
        <div class="m-1">
        <form action='' method='post'>
            <table class="table table-bordered tbl">
                <thead>
                <tr>
                    
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 
                    foreach($fact as $f) {
                ?>
                <tr>
                    <td><?php echo $f->title; ?></td>
                    <td><?php echo $f->content; ?></td>
                    <td>
                        <form action="update_facts_admin.php" method="post">
                            <input type="hidden" name="id" value="<?= $f->id; ?>"/>
                            <button type="submit" class="btn btn-dark" name="update_fact" id="update_fact">Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $f->id; ?>"/>
                            
                            <button type="submit" class="btn btn-dark" name="delete_fact" id="delete_fact">Delete</button>
                            
                        </form>
                    </td>
                </tr>
                <?php 
                } 
            ?>
                </tbody>
            </table>
            
            

        </form>

        </div>
        <a href="add_fact.php" id="add_fact" class="btn btn-secondary btn-lg">Add Fact</a>
    </main>
    <?php
    require_once '../includes/footer.php';
    ?>