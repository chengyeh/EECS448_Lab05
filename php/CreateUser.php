<?php
    $user_name = $_POST['user_name'];
    
    $mysqli = new mysqli("mysql.eecs.ku.edu", "clee28", "2482962", "clee28");
    
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $insert = "INSERT INTO Users (user_id) VALUES ('" . $user_name . "')";
    
    function addMessage(){
        
      if($GLOBALS['user_name'] != "")
      {    
        if($GLOBALS['mysqli']->query($GLOBALS['insert']) === TRUE)
        {
            echo "New account created successfully.<br>";
    		echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreatePosts.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Create Post</button></a>
    				<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreateUser.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
        } 
        else 
        {
            echo "Failed to create account. The username already exists.<br>";
    		echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreateUser.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
        }      
      }
      else 
      {
          echo "Failed to create account. Username cannot be blank.<br>";
    	  echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/CreateUser.html"><button type="button" style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
      }
      /* close connection */
      $GLOBALS['mysqli']->close();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab5 - Create User Interface</title>
    </head>
    <body style="font-family: Arial">
        <div style="margin:auto;width:480px;padding: 10px;">
        	<?php addMessage(); ?>  
        </div>
    </body>
</html>