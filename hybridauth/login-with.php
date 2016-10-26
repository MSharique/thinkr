<?php
        session_start();
        include('config.php');
        include('hybridauth/Hybrid/Auth.php');
        if(isset($_GET['provider']))
        {
        	$provider = $_GET['provider'];
        	
        	try{
        	
        	$hybridauth = new Hybrid_Auth( $config );
        	
        	$authProvider = $hybridauth->authenticate($provider);

	        $user_profile = $authProvider->getUserProfile();
	        
			if($user_profile && isset($user_profile->identifier))
	        {
	        	echo "<b>UserID</b> :".$user_profile->identifier."<br>";
				$uid = $user_profile->identifier;
				echo "<b>Name</b> :".$user_profile->displayName."<br>";
				$me = $user_profile->displayName;
	        	echo "<b>Profile URL</b> :".$user_profile->profileURL."<br>";
	        	echo "<b>Image</b> :".$user_profile->photoURL."<br> ";
	        	echo "<img src='".$user_profile->photoURL."'/><br>";
	        	echo "<b>Email</b> :".$user_profile->email."<br>";	  
				$email = $user_profile->email;
	        	echo "<br> <a href='logout.php'>Logout</a>";
				
				/* connect to mysql using mysqli */
	
				$mysqli = new mysqli($hostname, $db_username, $db_password,$db_name);
				if ($mysqli->connect_error) {
				die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
				}
				
				//Check user id in our database	
				$UserCount = $mysqli->query("SELECT COUNT(user_id) as usercount FROM social_detail WHERE user_id='$uid'")->fetch_object()->usercount; 
				echo "count = ".$UserCount;
				if($UserCount)
				{				
					$result = $mysqli->query("SELECT * FROM social_detail WHERE user_id='$uid'"); 
					$var = mysqli_fetch_array($result);
					echo $var['user_id'];
					echo " id = ".$var['registration_status'];
					login_user(true,$me,$uid);
					//User exist, Show welcome back message
					if($var['registration_status']){
					echo '<br /><strong>Welcome back '. $me.'!</strong> ( Facebook ID : '.$uid.') [<a href="$logoutUrl">Log Out</a>]';
						$mysqli->close();
						header('Location: '.$redirectUrl);
					}else {
						$mysqli->close();

						header('Location: '.$redirectUrl.'/register.php');
						}
					//print user facebook data
					//echo '<pre>';
					//print_r($me);
					//echo '</pre>';

		//User is now connected, log him in
					}
				else
				{
					//User is new, Show connected message and store info in our Database
					login_user(true,$me,$uid);
					// Insert user into Database.
					$check = $mysqli->query("INSERT INTO social_detail (user_id, name, email) VALUES ('$uid', '$me','$email')");
					if(!$check)echo "database error ".'<br>';	
					echo "inerted ...............";
						$mysqli->close();

					header('Location: '.$redirectUrl.'/register.php');
					//echo 'Ajax Response :<br />Hi '. $me['first_name'] . ' '. $me['last_name'].' ('.$uid.')! <br /> Now that you are logged in to Facebook using jQuery Ajax [<a href="'.$return_url.'?logout=1">Log Out</a>].
					//<br />the information can be stored in database <br />';
					//print user facebook data
					//echo '<pre>';
					//print_r($me);
					//echo '</pre>';
		
		// Insert user into Database.
		//$mysqli->query("INSERT INTO social_detail (user_id, name, email) VALUES ($uid, '$fullname','$email')");
				
					}
	
					//$mysqli->close();

				}	        

			}catch( Exception $e )
			{ 
			
				 switch( $e->getCode() )
				 {
                        case 0 : echo "Unspecified error."; break;
                        case 1 : echo "Hybridauth configuration error."; break;
                        case 2 : echo "Provider not properly configured."; break;
                        case 3 : echo "Unknown or disabled provider."; break;
                        case 4 : echo "Missing provider application credentials."; break;
                        case 5 : echo "Authentication failed. "
                                         . "The user has canceled the authentication or the provider refused the connection.";
                                 break;
                        case 6 : echo "User profile request failed. Most likely the user is not connected "
                                         . "to the provider and he should to authenticate again.";
  //                               $twitter->logout();
                                 break;
                        case 7 : echo "User not connected to the provider.";
    //                             $twitter->logout();
                                 break;
                        case 8 : echo "Provider does not support this feature."; break;
                }

                // well, basically your should not display this to the end user, just give him a hint and move on..
                echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

                echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";

			}
        
        }
function login_user($loggedin,$user_name,$user_id)
{
	/*
	function stores some session variables to imitate user login. 
	We will use these session variables to keep user logged in, until s/he clicks log-out link.
	*/
	$_SESSION['logged_in']=$loggedin;
	$_SESSION['user_name']=$user_name;
	$_SESSION['user_id']=$user_id;
}
?>