<?php
	$author_name = $_POST['user_name'];
	$content = $_POST['content'];
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "clee28", "2482962", "clee28");
	
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	
	$checkExist = mysqli_query($mysqli, "SELECT * FROM Users WHERE user_id = '" . $author_name . "'");
	$insert = "INSERT INTO Posts (author_id, content) VALUES ('" . $author_name . "','" . $content . "')";
	
	
	function ifExist(){
		if(mysqli_num_rows($GLOBALS['checkExist']) > 0)
		{
			return(ture);
		}
		else 
		{
			return(false);
		}
	}
	
	function addContent(){
	    
	  if($GLOBALS['content'] != "")
	  {    
	    if($GLOBALS['mysqli']->query($GLOBALS['insert']) === TRUE)
	    {
	        echo "New post created successfully.";
			echo '<br><a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreatePosts.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Create a New Post</button></a>';
	    } 
	    else 
	    {
			echo 'THIS IS AN ERROR.';
	    }      
	  }
	  else 
	  {
	      echo "Failed to create post. Content cannot be blank.";
		  echo '<br><a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreatePosts.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
	  }
	  
	  $GLOBALS['mysqli']->close();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lab5 - Create Posts Interface</title>
	</head>
	<body style="font-family: Arial">
		<div style="margin:auto;width:480px;padding: 10px;">
			<?php 
				if(ifExist())
				{
					addContent();
				}
				else 
				{
					echo 'Username does not exist. Please create a new account.<br>';
					echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreateUser.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Create Account</button></a>';
					echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreatePosts.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
                    $mysqli->close();	
				}
			?>
		</div>
	</body>
</html>