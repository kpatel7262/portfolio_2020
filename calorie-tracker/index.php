<?php

require "includes/header.php";
require 'includes/Database.php';
require 'classes/feedback.php';

//for search product calorie --- Krishna Patel's Part
require_once 'classes/Pro_Calorie.php';


$dbconn = Database::getDatabase();

$pc = new Pro_Calorie($dbconn);
$Pro_Calorie = $pc->list_pro();
	
	if(isset($_POST['search']))
    {   
        $keyword=$_POST['searchkey'];
        $getcalorie=$pc->getCalorie($keyword);
    }
//End

//Shikha Goyal's Part
	$f = new Feedback($dbconn);
	$status = "ON";
	$feedback = $f->listfeedback2($status);
//End


?>

    <!--main area starts here-->
    <!--Done by Krishna Patel-->
    <main>
        <br/>
        <div class="content">
            <div class="form-group col-md-8">
                <h2>Calorie Tracker</h2>
                <p>Calorie tracker will help you to maintain your diet and a healthy life. It will work as your personal dietrition who will always there with you in all your needs. It will also remind you and motivate you to your path. </p>
                <br/>
                
            </div>
            
            <form method="POST">
        	    <div class="form-group col-md-4">
    	            <h2>Check product calorie</h2>
	                <p><input type="text" name='searchkey'id='keyword' class="form-control" placeholder="Check how much calories one product contains.."/></p>
                	<button class="btn btn-secondary" type="submit" name="search">Search</button>
                		<div style="font-weight: bold;font-size: 1em;">
                	   
                            <?php
                                if(!empty($getcalorie['pro_calorie']))
                                {
                                    print_r ($getcalorie['pro_calorie']);

                                }
                                
                            ?>
                            
                		</div>
				</div>
            </form>
            <br/>
            <!--End-->

            <!--Done by Shikha Goyal-->
             <div class="form-group col-md-10">
                <h2>Feedback from our users</h2>
                <?php foreach($feedback as $f){?>
                <ul>
                   <li style="font-weight: normal;color: grey"><?= $f->description;?></li>
                </ul>
                <?php }?>
                <a href="feedback_user.php" class="btn btn-primary">Click me to give feedback</a>
            </div>
            <!--End-->

            <!--Done by Krishna Patel-->
            <br/>



        </div>
    </main>
<!--End-->
<?php
require "includes/footer.php" ;
?>