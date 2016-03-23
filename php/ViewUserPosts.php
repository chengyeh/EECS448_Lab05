<?php
    echo "<link href='css/post_table.css' rel='stylesheet' type='text/css'>";

    $mysqli = new mysqli("mysql.eecs.ku.edu", "clee28", "2482962", "clee28");
    
    $username = $_POST['username'];
    
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $show_post = "SELECT post_id,author_id,content FROM Posts WHERE author_id = '" . $username . "' ORDER BY post_id ASC";
    
    function displayPost(){
        $result = $GLOBALS['mysqli']->query($GLOBALS['show_post']);
        
        if(($result->num_rows) > 0)
        {
            echo "<div class='post_div'> <table><tr> <td>Post #</td><td>Author</td><td>Content</td> </tr>";
            while($row = $result->fetch_assoc())
           {
               echo "<tr><td>" . $row["post_id"] . "</td>";
               echo "<td>" . $row["author_id"] . "</td>";
               echo "<td>" . $row["content"] . "</td></tr>";
           }  
           echo "</table></div>";
           echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/ViewUserPosts.html"><button type="button" 
                   style="margin:20px auto;font-weight:bold;border-radius:10px">Search Different User</button></a>';
        }
        else
        {
            echo "<div style='margin:auto;width:480px;padding: 10px;'>This user has not yet created any post.<br>";
            echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/ViewUserPosts.html"><button type="button" 
                    style="margin:20px auto;font-weight:bold;border-radius:10px">Search Different User</button></a></div>';
        }
        
        $GLOBALS['mysqli']->close();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab5 - View User Posts</title>
    </head>
    <body style="font-family: Arial">
        <div style="margin:20px auto;">
            <?php displayPost(); ?><br>        
        </div> 
    </body>
</html>