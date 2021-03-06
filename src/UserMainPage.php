<?php
require 'User.php';
require 'Tweet.php';
require 'config.php';
require 'Comment.php';
session_start();


?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        
       <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,firerox=1" /> -->
        <title>Tweeter - strona użytkownika</title>
    </head>
    <body>

        
        <table border="1px" style="width:100%">
 <?php           
      $allTweets = Tweet::loadAllTweetsByUserId($connection, $_SESSION['userID']);
      
      $reverseTweets = array_reverse($allTweets);

      foreach ($reverseTweets as $value){
          $id = $value->getUserId();
          
          $sql = "SELECT email, username From Users WHERE id = $id";
          $result = $connection->query($sql);
          $row = $result->fetch_assoc();  
        echo '<table border="3px"><tr>
          <th>Name: '.$row['username'].'</th>
          <th>Email: '.$row['email'].'</th>
          <th>Tweet: '.$value->getText().'</th> 
          <th>Data powstania tweetu: '.$value->getCreationDate().'</th>
          <th>Comment: </th>
        </tr></table>';
        $allComments = Comment::loadAllCommentsByPostId($connection, $value->getId());
        $allCommentsNew = array_reverse($allComments);
      // var_dump($allCommentsNew); 
       
       for($i = 0; $i<count($allCommentsNew); $i++){
           $userId = $allCommentsNew[$i]->getUserId();
           $sql2 = "SELECT id, email, username FROM Users WHERE id=$userId";
           $result2 = $connection->query($sql2);
           $row2 = $result2->fetch_assoc();
           
           echo '<table border="1px" color="green" width="100%"><tr>
               
                    <td> Od: '.$row2['username'].'</td>
                    <td> Data: '.$allCommentsNew[$i]->getCreationDate().'</td>
                    <td> Komentarz: '. $allCommentsNew[$i]->getText().'</td>
           
                </tr></table>';
       }
      }    
  ?>
</table>
        
<?php




?>
        
    </body>
</html>