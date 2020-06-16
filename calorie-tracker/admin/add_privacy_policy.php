<?php
require_once '../includes/Database.php';
require_once '../classes/Privacy_Policy.php';

$policy_question = $policy_answer = ""; //variables to store input
$policy_question_err = $policy_answer_err = ""; //variables to store error

/*add policy*/
if(isset($_POST['add_privacy_policy'])) {
    $policy_question = $_POST['policy_question'];
    $policy_answer = $_POST['policy_answer'];
    
    if ($policy_question == "" || $policy_question == null) {
            $policy_question_err = "*Please enter query related to policy...";
    
        }
    
    if ($policy_answer == "" || $policy_answer == null) {
            $policy_answer_err = "*Please enter answer of the query...";
        }

        else{
            $dbconn = Database::getDatabase();
            $p = new Privacy_Policy($dbconn);
            $count = $p->add_privacy_policy($policy_question,$policy_answer);
            
            
            if($count){
                header("Location:list_privacy_policy_admin.php");
            } else {
                echo "Error adding policy";
            }
    }
}


require_once '../includes/admin_header.php';
?>

<main class="col-md-10 container">
   <!--add privacy policy-->
    <form action="" method="post">
        <div class="form-group">
            <div  class="form-group">
                <label for="policy_question">Policy Question:</label>
                <input type="text" name="policy_question" class="form-control" id="policy_question" placeholder="Enter Question related Privacy Policy" value="<?php 
                if(isset($policy_question)){
                    echo $policy_question;
                }
                ?>" />
                <span style="color:red;"><?= $policy_question_err;?></span>

            </div>
            <div  class="form-group">
                <label for="policy_answer">Policy Answer:</label>
                <textarea rows="10" cols="5" name="policy_answer" class="form-control" id="policy_answer" placeholder="Enter the Privacy Policy details" value="<?php 
                if(isset($policy_answer)){
                    echo $policy_answer;
                }
                ?>"></textarea>
                <span style="color:red;"><?= $policy_answer_err;?></span>
            </div>

            <a href="list_privacy_policy_admin.php" id="btn_back" class="btn btn-secondary float-left">Back</a>

            <button type="submit" name="add_privacy_policy" id="add_privacy_policy" class="btn btn-secondary float-right" id="btn-submit">
                Add Policy
            </button>
        </div>
    </form>

</main>
<?php
require_once '../includes/footer.php';
?>