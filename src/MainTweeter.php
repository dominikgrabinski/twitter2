<?php
require 'User.php';
require 'Tweet.php';
require 'config.php';



?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../css/style.css" type="text/css">
       <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,firerox=1" /> -->
        <title>Tweeter - strona główna</title>
    </head>
    <body>
        
  <ul>
  <li><a>Witaj! "Nazwa użytkownika"</a></li>
  <li><a href="news.asp">Twoje Tweety</a></li>
  <li><a href="contact.asp">Contact</a></li>
  <li><a href="about.asp">About</a></li>
  <li><a href="logout.php">Wyloguj</a></li>
</ul>
        
        <form action="addTwitt.php" method="POST">
        <textarea name= "tweet" ></textarea>
        <input type="submit" value="Wyślij tweeta">
        </form>
        
        <table border="1px" style="width:100%">
 <?php           
      $allTweets = Tweet::loadAllTweets($connection);

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
          <th>Zobacz tweeta:        <form action="oneTwitt.php" method="POST">
        
        <input type="submit" value="Kliknij">
        </form> </th>
        </tr>';
        
      }    
  ?>
</table>
        
<?php



//echo "<p> Witaj " . $_SESSION['user']. ' ![ <a href="logout.php">Wyloguj się</a> ]</p>';
//
//echo "<p><b>email</b>:".$_SESSION['email']."</p>";

?>
        
    </body>
</html>