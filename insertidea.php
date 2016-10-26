<?php
//session_start();
require_once('config.php');
require_once('session.php'); 
//check for session , agr nhi ho to redirect to index.php
if(!isset($_SESSION['logged_in']))
{
header('Location: '.$redirectUrl);
}
//check for submission type , i.e. eithr submit or save as draft , if not any than redirect
if(!isset($_POST['draft_form']) &&  !isset($_POST['submit_form']))
{
	echo "submit error".'<br>';
	header('Location: '.$logoutUrl);
	}
//creating obj of mysqli to access DB
$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		//header('Location: '.$dashUrl);
		}
	$idea_id = $_POST["idea_id"];	
	//echo '<br>'."idea_id = ".$idea_id;
	$membersno=$_POST["no_of_members"]; 	//team membere
	//echo '<br>'."members = ".$membersno;
	$idea_title= $_POST["title"];			//idea title
	//echo '<br>'."title = ".$idea_title;
	//$idea_category=$_POST["category"];
	$idea_description=$_POST["ideasum"];	//idea summary
	//echo '<br>'."desc = ".$idea_description;
	$un=$_SESSION['user_id'];		//user_id of current user 
	//echo '<br>'."un = ".$un;
	$idea_num = $_POST["idea_no"];		//idea number of current user
	//echo '<br>'."idea num = ".$idea_num;
	$generated = $_POST["generate"];	//status of idea_id , i.e. idea generated OR idea received
	//echo '<br>'."gene = ".$generated;
	$other = $_POST['otheroption'];
//	echo '<br>'."other = ".$other;
	
	if(!empty($_POST['check_list'])){		//taking categories of ideas
			$idea_category = "";
			// Loop to store and display values of individual checked checkbox.
			foreach($_POST['check_list'] as $selected){
	//		echo $selected."</br>";
			$idea_category = $idea_category.' '.$selected.' ';
			}
	//		echo '<br>'."cte = ".$idea_category.'<br>';
			}
	$idea_category = $idea_category.$other;
	//echo '<br>'."cate = ".$idea_category;
	//echo "gene = $generated";
	
?>
<?php 
// idea submmissionnnnnnnnnnnnnnnn
if($generated == "true")		//new idea , insert it into ideate table
	{
		//echo '<br>'."inswer ";
		$z = $mysqli->query("insert into ideate values('$idea_title','$idea_category','$idea_description','$idea_id',0,'$membersno')");
		if(!$z)
		{
			echo '<br>'." sql error : ".mysql_error();
			header('Location: '.$logoutUrl);
			}
		$check_before_update = $mysqli->query("SELECT * FROM ideate WHERE idea_id='$idea_id' ");
		if(!$check_before_update)
		{
			echo "sqllllllllllllError";
			header('Location: '.$logoutUrl);
			}
		$check_submit_status = mysqli_fetch_array($check_before_update);
		if($check_submit_status==1)header('Location: '.$logoutUrl);	
		if(isset($_POST['submit_form']))
		{
			//echo "submit _form ......................".'<br>';
			$check =  $mysqli->query("update ideate set title='$idea_title',category='$idea_category',summary='$idea_description',submit=1 where idea_id='$idea_id' ");
			if(!$check)echo "sql error 1".'<br>';//header('Location: '.$dashUrl);
			}
		else if(isset($_POST['draft_form']))
		{
			$check = $mysqli->query("update ideate set title='$idea_title',category='$idea_category',summary='$idea_description',submit='0'  where idea_id='$idea_id' ");
			if(!$check)echo "sql error 2".'<br>';//header('Location: '.$dashUrl);
			}
		else 
		{
			echo "Oops , something went wrong ";
			header('Location: '.$dashUrl);
			}
		}
	else		//edit in idea
	{
		$str = $mysqli->query("SELECT * FROM ideate WHERE idea_id='$idea_id' ");
		if(!$str)
		{
			echo '<br>'." sql error : ".mysql_error();
			//header('Location: '.$logoutUrl);
			}
		$r=mysqli_fetch_array($str);
		if(!$r)echo "sql error 4".'<br>';//header('Location: '.$dashUrl);
		$count = mysqli_num_rows($r);
		//echo "counht = $count ";
		//echo "submt_status = ".$r['submit'];
		if($r['submit'])header('Location: '.'http://localhost');
		else
		{
		if(isset($_POST['submit_form']))
		{
			//echo "submit _form ......................".'<br>';
			$check = $mysqli->query("update ideate set title='$idea_title',summary='$idea_description',submit=1 where idea_id='$idea_id' ");
			if(!$check)echo "sql error 5".'<br>';//header('Location: '.$dashUrl);
			}
		else if(isset($_POST['draft_form']))
		{
			$check = $mysqli->query("update ideate set title='$idea_title',category='$idea_category',summary='$idea_description',submit='0'  where idea_id='$idea_id' ");
			if(!$check)echo "sql error 6".'<br>';//header('Location: '.$dashUrl);
			}
		else 
		{
			echo "Oops , something went wrong ";
			header('Location: '.$logoutUrl);
			}
		}
 		}
		?>
<?php
if($generated == "true")
{
if($membersno<4)	//update idea_id in current user DB
{
	$sql = $mysqli->query("SELECT * FROM social_detail where user_id='$un' ");
	$temp = mysqli_fetch_array($sql);
	if($idea_num==1 && $temp['idea_1_id']==null)
	{
		$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where user_id='$un' ");
		if(!$check)header('Location: '.$dashUrl);
		}
	else if($idea_num==1 && $temp['idea_1_id']!=null) header('Location: '.$dashUrl);
	else	header('Location: '.$dashUrl);
	if($idea_num==2 && $temp['idea_2_id']==null)
	{
		$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where user_id='$un' ");
		if(!$check)header('Location: '.$dashUrl);
		}
	else if($idea_num==2 && $temp['idea_2_id']!=null)header('Location: '.$dashUrl);
	else header('Location: '.$dashUrl);
	if($idea_num==3 && $temp['idea_3_id']==null)
	{
		$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where user_id='$un' ");
		if(!$check)header('Location : '.$dashUrl);
		}
	else if($idea_num==3 && $temp['idea_3_id']!=null)header('Location: '.$dashUrl);
	else
	{
		echo "Oops , something went wrong ";
		header('Location: '.$logoutUrl);
		}
	}
if($membersno==2)	//team of member 2
{
	$id_registration = $_POST['id1'];
	$q = $mysqli->query("select * from social_detail where id_registration='$id_registration' ");
	if(!$q)header('Location: '.$dashUrl);
	$r=mysqli_fetch_array($q);
	if(!$r)header('Location: '.$dashUrl);
	$total_count=$r['total_count'];
	if($total_count==0)
	{
		$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
		if(!$check)header('Location: '.$dashUrl);
		}
	else if($total_count==1)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else 
		{	
			header('Location: '.$dashUrl);
			}
		}
	else if($total_count==2)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else header('Location: '.$dashUrl);
		}
	else 
	{	
		$check = $mysqli->query("update ideate set members=members-1 where idea_id='$idea_id' ");
		if(!$check)header('Location: '.$dashUrl);
		header('Location: '.$dashUrl);
		}
	}
	
	//membr 3
if($membersno==3)
{
	$id_registration = $_POST['id1'];	//for member I from team of 3
	$q=$mysqli->query("select * from social_detail where id_registration='$id_registration' ");
	if(!$q)header('Location: '.$dashUrl);
	$r=mysqli_fetch_array($q);
	if(!$r)header('Location: '.$dashUrl);
	$total_count=$r['total_count'];
	if($total_count==0)
	{
		$check = $mysqli->query("update social_detail set idea_1_id='$idea_id' where id_registration='$id_registration' ");
		if(!$check)header('Location: '.$dashUrl);
		}
	else if($total_count==1)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else header('Location: '.$dashUrl);
		}
	else if($total_count==2)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else header('Location: '.$dashUrl);
		}
	else 
	{	
		$check = $mysqli->query("update ideate set members=members-1 where idea_id='$idea_id' ");
		if(!$check)header('Location: '.$dashUrl);
		header('Location: '.$dashUrl);
		}
	
	//member no 3 in team having member = 3
		
	$id_registration = $_POST['id2'];
	$q=$mysqli->query("select * from social_detail where id_registration='$id_registration' ");
	if(!$q)header('Location: '.$dashUrl);
	$r=mysqli_fetch_array($q);
	if(!$r)header('Location: '.$dashUrl);
	$total_count=$r['total_count'];
	if($total_count==0)
	{
		$check = $mysqli->query("update social_detail set idea_1_id='$idea_id' where id_registration='$id_registration' ");
		if(!$check)header('Location: '.$dashUrl);
		}
	else if($total_count==1)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else header('Location: '.$dashUrl);
		}
	else if($total_count==2)
	{
		if($r['idea_1_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_1_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_2_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_2_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else if($r['idea_3_id']==null)
		{
			$check = $mysqli->query("update social_detail set idea_3_id='$idea_id',total_count=total_count+1 where id_registration='$id_registration' ");
			if(!$check)header('Location: '.$dashUrl);
			}
		else header('Location: '.$dashUrl);
		}
	else 
	{	
		$check = $mysqli->query("update ideate set members=members-1 where idea_id='$idea_id' ");
		if(!$check)header('Location: '.$dashUrl);
		header('Location: '.$dashUrl);
		}
	}
	
	}	
	$mysqli->close();	
	header('Location: '.$dashUrl);
	?>
	
