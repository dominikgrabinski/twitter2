<?php
require 'User.php';
require 'Tweet.php';
require 'config.php';
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
        echo '<tr>
          <th>Name: '.$row['username'].'</th>
          <th>Email: '.$row['email'].'</th>
          <th>Tweet: '.$value->getText().'</th> 
          <th>Data powstania tweetu: '.$value->getCreationDate().'</th>
          <th>Comment: </th>
        </tr>';
        
      }    
  ?>
</table>
        
<?php




?>
        
    </body>
</html>