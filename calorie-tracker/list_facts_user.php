<?php
require_once 'includes/Database.php';
require_once 'classes/facts.php';
define("ROW_PER_PAGE",2);


//gives list of facts
$dbconn = Database::getDatabase();
$f = new facts($dbconn);
$fact = $f->list_facts();

    /*search starts*/
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM calorie_facts WHERE title LIKE :keyword OR content LIKE :keyword ';
	/*search ends*/

	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $dbconn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page pagination-btn" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page pagination-btn" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $dbconn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	/*pagination ends*/

include_once 'includes/header.php';
?>

<p class="h1 text-center">Calorie Facts</p>
<!--search fact from the list-->
	<form name='frmSearch' action='' method='post' class="form-inline my-2 my-lg-0">
		<div class="col-md-6">
			<input type='search' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' class="form-control mr-sm-2" />
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</div>

		<div class="container">
		    <div class="row"> <!--displaying the facts in row-->
		        <?php
		        if(!empty($result)) { 
			        foreach($result as $row) {
			            ?>
			            <h3><?= $row['title']; ?></h3><!--displays the data which are in title-->
			            <p><?= $row['content']; ?></p><!--displays the data which are in content-->
			            <br/>
			        <?php
			         	}
			         } 
			         ?>
		<?php echo $per_page_html; ?><!--page numbering-->
		    </div>
		</div>

	</form>

<?php
require_once 'includes/footer.php';
?>