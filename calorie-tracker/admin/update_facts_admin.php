<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/facts.php';

$id_f = $title_f = $content_f ="";
$dbconn = Database::getDatabase();
$f = new facts($dbconn);
    
    //fetching the existing value
	if(isset($_POST['update_fact'])) {
	    $id_f = $_POST['id'];
	    $sql = "SELECT * FROM calorie_facts where id=:id";
        $pdostm = $dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id_f);
        $pdostm->execute();
        $fact = $pdostm->fetch(PDO::FETCH_OBJ);
        
        $title_f = $fact->title;
        $content_f = $fact->content;
	    //var_dump($fact);
	}

    //changing the existing value
	if(isset($_POST['update_btn'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		
		$count = $f->update_fact($id, $title, $content);
		if($count){
			header("Location:list_facts_admin.php");
		}	
			else{
				echo "Problem updating Fact";
			}
	}
    
?>
<main class="col-md-10 container">
    <!--Form to update Fact -->
    <form action="" method="POST">
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $id_f; ?>" />
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $title_f; ?>" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="content">Content :</label>
                <input type="text" class="form-control" id="content" name="content" value="<?= $content_f; ?>" placeholder="Enter content">
            </div>

            <div class="form-group">
                <a href="list_facts_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>
            </div>
        
            <div class="form-group">
                <button type="submit" name="update_btn" class="btn btn-secondary float-right" id="btn-submit">Update</button>
            </div>
        </div>
    </form>
</main>

<?php include '../includes/footer.php'?>