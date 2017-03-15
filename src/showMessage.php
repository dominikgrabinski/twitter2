<?php

require 'Message.php';
require 'config.php';
require 'User.php';

session_start();

if(!isset($_SESSION['userID'])){
    echo "przekierowanie na stronę logowania";
    header('refresh:2, url=login.php');
}else{

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Wiadomości</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>


        
        <a href="MainTweeter.php">Powrót do strony głównej</a><br>
    </body>
</html>



<?php

//    $allMessage = Message::loadMessageByUserId($connection, $_SESSION['userID']);
//   
//    foreach ($allMessage as $value){
// 
//    echo '<tr>   
//            <table border="2px" width="100%">
//                <th> ID użytkownika: '.$value->getUserId().'</th>
//                <th> Treść: '.$value->getText().'</th>
//                <th> Data: '.$value->getCreationDate().'</th>  
//                <th>  '.$value->getReaded().'</th>    
//
//
//            </table>
//          </tr>
//          '; 
//    }

if(!empty($_GET['id']))
{
    $msg1 = Message::loadMessageById($connection, $_GET['id']);
    $msg1->setReaded(0);
    $msg1->saveToDB($connection);
}

$msg = Message::loadMessageByUserId($connection,$_SESSION['userID']);

foreach ($msg as $value)
{
  echo "<tr>";
  echo        '<table border="2px" width="100%">';
 // echo "<th>".$value->getUserId()."</th>";
  if($value->getReaded() == 1)
     echo "<th><a href='showMessage.php?id=".$value->getId()."'>".$value->getText()."</th>";
  else
      echo "<th>".$value->getText()."</th>";
  echo "<th>".$value->getCreationDate()."</th>";

}
echo "</table>";
  echo "</tr><br>";
}
?>


