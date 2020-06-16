<?php
require '../includes/admin_header.php';
require '../includes/Database.php';
require '../classes/Privacy_Policy.php';

$id_u = $policy_que_u = $policy_ans_u = "";
$dbconn = Database::getDatabase();
$p = new privacy_policy($dbconn);
	
	/*fetching existing value*/
	if(isset($_POST['update_privacy_policy'])) {
	    $id_u = $_POST['id'];
	    $sql = "SELECT * FROM privacy_policy where id=:id";
        $pdostm = $dbconn->prepare($sql);
        $pdostm->bindparam(':id',$id_u);
        $pdostm->execute();
        $privacy_policy = $pdostm->fetch(PDO::FETCH_OBJ);

        $policy_que_u = $privacy_policy->policy_question;
        $policy_ans_u = $privacy_policy->policy_answer;

        //var_dump($privacy_policy);
	}

	/*changing existing value*/
	if(isset($_POST['update_btn'])){
		$id = $_POST['id'];
		$policy_question = $_POST['policy_question'];
        $policy_answer = $_POST['policy_answer'];
		
		$count = $p->update_privacy_policy($id, $policy_question, $policy_answer);
		if($count){
			header("Location:list_privacy_policy_admin.php");
		}	
			else{
				echo "Problem updating policy information";
			}
	}

?>
<!--update privacy policy-->
<main class="col-md-10 container">
    <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?= $id_u; ?>" />
        <div class="form-group">
            <label for="policy_question">Policy Question:</label>
            <input type="text" class="form-control" name="policy_question" id="policy_question" value="<?= $policy_que_u; ?>" placeholder="Enter Question related to Privacy Policy" required>
		</div>
        <div class="form-group">
            <label for="policy_answer">Policy Answer:</label>
            <input type="text" class="form-control" name="policy_answer" id="policy_answer" value="<?= $policy_ans_u; ?>" placeholder="Enter Answer" required>
		</div>

		<a href="list_privacy_policy_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>
        <button type="submit" name="update_btn" class="btn btn-secondary float-right" id="btn-submit">Update</button>
	</form>
</main>

<?php include '../includes/footer.php'?>