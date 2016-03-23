<?php
    echo "<link href='css/user_table.css' rel='stylesheet' type='text/css'>";
    
    $mysqli = new mysqli("mysql.eecs.ku.edu", "clee28", "2482962", "clee28");
		
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	
	$displayUser = "SELECT user_id FROM Users ORDER BY user_id ASC";
	$result = $mysqli->query($displayUser);
	
    function table(){
        
        if($GLOBALS['result']->num_rows > 0)
        {
            echo "<div class='username_div'> <table> <tr> <td>Current User</td> </tr>";
             while($row = $GLOBALS['result']->fetch_assoc()) 
             {
                echo "<tr><td>" . $row["user_id"] . "</td></tr>";
             }
            echo "</table></div>";
            echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/AdminHome.html"><button type="button" style="margin:20px auto;
                    font-weight:bold;border-radius:10px">Go Back</button></a>';
        }
        else 
        {
            echo "<div style='margin:auto;width:480px;padding: 10px;'>No user found.<br>";
            echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/AdminHome.html"><button type="button" style="margin:20px auto;
                    font-weight:bold;border-radius:10px">Go Back</button></a></div>';  
        }
        
      $GLOBALS['mysqli']->close();           
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab5 - View Users</title>
    </head>
    <body style="font-family: Arial">
        <div style="margin:20px auto;">
            <?php table(); ?>
        </div>
    </body>
</html>