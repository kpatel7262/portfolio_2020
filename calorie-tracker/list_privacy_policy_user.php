<?php
require_once 'includes/Database.php';
require_once 'classes/Privacy_Policy.php';


/*gives list of policies*/
$dbconn = Database::getDatabase();
$p = new Privacy_Policy($dbconn);
$privacy_policy = $p->list_privacy_policy();

	/*search starts*/
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM privacy_policy WHERE policy_question LIKE :keyword OR policy_answer LIKE :keyword ';

	$pdo_statement = $dbconn->prepare($sql);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	/*search ends here*/

include_once 'includes/header.php';
?>
<body style="background:#dfebd8">
<main>	
	<!--for list_privacy_policy_user.php collapse-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

	<p class="h1 text-center">Privacy Policy</p>
	<form name='frmSearch' action='' method='post' class="form-inline my-2 my-lg-0">
		<div class="col-md-6">
				<input type='search' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' class="form-control mr-sm-2" />
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</div>
		</form>

    	<div class="container">
      		<div class="panel-group" style="margin:auto;text-align: justify; ">

        	<?php
            	foreach($result as $p) {
        	?>
				<div class="panel panel-default">
	      			<div class="panel-heading">
	        			<h4 class="panel-title">
	          				<a data-toggle="collapse" href="#policy_answer" data-target="#demo<?=$p['id'];?>">
	          					<?= $p['policy_question'] ?></a>
	        			</h4>
	      			</div>
	      			<div id="policy_answer" class="panel-collapse collapse in">
	        			<div class="panel-body" id="demo<?=$p['id'];?>"><?= $p['policy_answer']; ?></div>
	      			</div>
	    		</div>
			<?php
			 	} 
			 ?>
        
      		</div>
		</div>
</main>
</body>
<?php
require_once 'includes/footer.php';
?>