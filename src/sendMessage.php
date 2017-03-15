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
        <form method="POST">
             <textarea cols="100" name="message" placeholder="Wpisz wiadomość"></textarea>
                Wybierz użytkownika: 
            <select name="userId">
                 <?php
                    $allUsers = User::loadAllUsers($connection); 
                         foreach ($allUsers as $selectUser){
                             echo '<option value='.$selectUser->getId().'>'.$selectUser->getUserName().'</options>';
 
                        }
                 ?>
             </select>
             <input value="Wyślij wiadomość" type="submit">
             
         </form>
        
        <a href="MainTweeter.php">Powrót do strony głównej</a>
    </body>
</html>



<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $oMessage = new Message;
        $oMessage->setUserId($_POST['userId']);
        $oMessage->setText($_POST['message']);
        $oMessage->setCreationDate();
       // $oMessage->setReaded(1);
        $oMessage->setMessageFrom($_SESSION['userID']);
        
        $oMessage->saveToDB($connection);
        
        echo '<div class="send"> Wiadomość wysłana </div>';
        
        header('refresh:2; url=showMessage.php');
    }



}
?>




