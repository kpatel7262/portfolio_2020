<?php
require_once '../includes/Database.php';
require_once '../classes/facts.php';

$title_err = $content_err = "";//variables for error msgs
$title = $content ="";//variables for input

/*add fact*/
if(isset($_POST['add_fact'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($title == "" || $title == null) {
            $title_err = "*Please enter title for the fact...";
    
        }
    
    if ($content == "" || $content == null) {
            $content_err = "*Please enter the fact details...";
        }
        
        else {
            $dbconn = Database::getDatabase();
            $f = new facts($dbconn);
            $count = $f->add_fact($title, $content);

            if($count){
                header("Location:list_facts_admin.php");
            } else {
                echo "Error occured adding facts";
            }
        }
}

require_once '../includes/admin_header.php';
?>

<main class="col-lg-10 container">
    <!--Add fact-->
    <form action="" class="container" method="post" style="margin-bottom: 100px;">
        <div>
            <h3>Add Fact</h3>
            <div  class="form-group">
                <label for="title">Title :</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter fact title" value="<?php
                        if(isset($title)){
                            echo $title;
                        }
                    ?>"/>
                    <span style="color:red;"><?= $title_err;?></span>
            </div>
            <div  class="form-group">
                <label for="content">Content :</label>
                <input type="text" class="form-control" id="content" name="content" placeholder="Enter fact content" value="<?php
                        if(isset($content)){
                            echo $content;
                        }
                    ?>"/>
                    <span style="color:red;"><?= $content_err;?></span>
            </div>
            
            <a href="list_facts_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>

            <button type="submit" name="add_fact" id="add_fact" class="btn btn-secondary float-right" id="btn-submit">
                Add Fact
            </button>
        </div>
    </form>

</main>
<?php
require_once '../includes/footer.php';
?>