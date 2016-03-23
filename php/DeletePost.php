<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "clee28", "2482962", "clee28");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
   
   function deletePost(){
        if(!empty($_POST['delete'])) 
        {
            foreach($_POST['delete'] as $check) 
            {
                $delete_post = "DELETE FROM Posts WHERE post_id = '" . $check. "'"; 
                $GLOBALS['mysqli']->query($delete_post);   
                echo "<div style='margin:auto;width:480px;padding: 10px;'>Post #" . $check . " deleted successfully.<br>";
                echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/DeletePost.html"><button type="button" 
                            style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a>';
            }
        }
        else 
        {
            echo "<div style='margin:auto;width:480px;padding: 10px;'>No post has been deleted.<br>";   
            echo '<a href="http://people.eecs.ku.edu/~clee28/EECS448/Lab5/DeletePost.html"><button type="button" 
                        style="margin:20px auto;font-weight:bold;border-radius:10px">Go Back</button></a></div>'; 
        }
        
        $GLOBALS['mysqli']->close();
   }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab5 - Delete Post</title>
    </head>
    <body style="font-family: Arial">
        <div>
            <?php deletePost(); ?>  
        </div>
    </body>
</html>