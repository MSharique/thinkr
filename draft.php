<?php
//session_start();
require_once('config.php');
require_once('session.php'); 
if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
if(!isset($_POST['draft_form']) &&  !isset($_POST['submit_form']))
{
	echo "submit error".'<br>';
	//header('Location: '.$errorUrl);
	}
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		//header('Location: '.$errorUrl);
		}
	$idea_title= $_POST["title"];			//idea title
	echo '<br>'."title = ".$idea_title;
	//$idea_category=$_POST["category"];
	$idea_description=$_POST["ideasum"];	//idea summary
	echo '<br>'."desc = ".$idea_description;
	$un=$_SESSION['user_id'];		//user_id of current user 
	echo '<br>'."un = ".$un;
	$idea_num = $_POST["idea_no"];		//idea number of current user
	echo '<br>'."idea num = ".$idea_num;
	$idea_id = $_POST["idea_id"];	
	echo '<br>'."idea_id = ".$idea_id;
	$other = $_POST['otheroption'];
	echo '<br>'."other = ".$other;
	if(!empty($_POST['check_list'])){		//taking categories of ideas
			$idea_category = "";
			// Loop to store and display values of individual checked checkbox.
			foreach($_POST['check_list'] as $selected){
			echo $selected."</br>";
			$idea_category = $idea_category.' '.$selected.' ';
			}
			echo '<br>'."cte = ".$idea_category.'<br>';
			}
	$idea_category = $idea_category.$other;
	echo '<br>'."cate = ".$idea_category;
	echo "gene = $generated";
	
?>
<?php 
// idea submmissionnnnnnnnnnnnnnnn
		$str = "SELECT * FROM ideate WHERE idea_id='$idea_id'";
		if(!$str)
		{
			echo '<br>'." sql error : ".mysql_error();
			//header('Location: '.$logoutUrl);
			}
		$r=mysqli_fetch_array($str);
		if(!$r)echo "sql error 4".'<br>';//header('Location: '.$errorUrl);
		$count = mysqli_num_rows($r);
		//echo "counht = $count ";
		if(isset($_POST['submit_form']))
		{
			//echo "submit _form ......................".'<br>';
			$check = $mysqli->query("update ideate set title='$idea_title',summary='$idea_description',submit=1 where idea_id='$idea_id' ");
			if(!$check)echo "sql error 5".'<br>';//header('Location: '.$errorUrl);
			}
		else if(isset($_POST['draft_form']))
		{
			$check = $mysqli->query("update ideate set title='$idea_title',category='$idea_category',summary='$idea_description',submit='0'  where idea_id='$idea_id' ");
			if(!$check)echo "sql error 6".'<br>';//header('Location: '.$errorUrl);
			}
		else 
		{
			echo "Oops , something went wrong ";
			header('Location: '.$logoutUrl);
			}
		?>
