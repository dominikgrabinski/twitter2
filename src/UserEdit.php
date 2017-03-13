<?php

require 'config.php';
require 'User.php';
session_start();

if(!isset($_SESSION['userID'])){
    echo "Przekierowanie na stronę logowania";
    header('refresh:2, url=login.php');
}else{
    

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Edytuj dane</title>
        <meta charset="UTF-8">
       <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
                       <link rel="stylesheet" href="../css/style.css" type="text/css">
<!--                <style>
                    .error{
                        color: red;
                    }
                </style>-->
    </head>
    <body>
        <form method="POST">
            By wprowadzić zmiany wpisz wszystkie pola !! <br><br>
            Podaj nowy email: <input name="newMail" type="text"><br>
            Podaj nową nazwę użytkownika: <input name="newUsername" type="text"><br>
            Podaj nowe hasło: <input name="newPassword" type="password"><br>
            <br>
            Podaj stare hasło: <input name="oldPassword" type="password"><br>
            <input value="Edytuj dane" type="submit">
        </form>
        
        <a href="MainTweeter.php">Powrót do strony głównej</a>
        <br><br>
        <div class="error"> NIE MA ODWROTU !!</div> 
        <form action="deleteUser.php" method="POST">
            
            <input value="USUŃ UŻYTKOWNIKA" type="submit">
        </form>
    </body>
</html>

<?php
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $loggedUser=User::loadUserById($connection, $_SESSION['userID']);
    $newPass = hash('sha256',$_POST['oldPassword']);
    if($newPass == $loggedUser->getPassword()){
    
    $loggedUser->setEmail($_POST['newMail']);
    $loggedUser->setHashedPassword($_POST['newPassword']);
    $loggedUser->setUserName($_POST['newUsername']);
//        if(empty($_POST['newMail']) || empty($_POST['newPassword']) || empty($_POST['newUsername'])){
//            $loggedUser->getEmail();
//            $loggedUser->getUserName();
//            $loggedUser->getPassword();
//        }
    
    $loggedUser->saveToDB($connection);
    echo "Przesłanie do BD";
    }else{
        echo "Podaj dobre haslo";
    }
}
?>

