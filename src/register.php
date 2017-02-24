<?php
require_once 'config.php';
require_once 'User.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST)){
        
       // $emailToCheck = $_POST['email'];
        $sql = mysqli_query($connection, "SELECT email FROM Users WHERE email = '".$_POST['email']."'"); 
        
        if(mysqli_num_rows($sql) > 0){
            echo "Mail już istnieje";
           header('refresh:2;url=register.php');
        }else{
        
        $newUser = new User();
        $newUser->setUserName($_POST['userName']);
        $newUser->setEmail($_POST['email']);
        $newUser->setHashedPassword($_POST['hashedPassword']);
        $newUser->saveToDB($connection);
        echo "Zarejestrowano";
        header('refresh:2; url=login.php');
        }
    }
}   
?>
<html>
    <head>
        <title>Formularz rejestracji</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
                
        Tweeter<br /> <br />
        <form action="register.php" method="POST">
            Nazwa użytkownika:  <br /><input type="text" name="userName" /> <br />
            Email:              <br /><input type="text" name="email" /> <br />
            Hasło:              <br /><input type="password" name="hashedPassword" /> <br /> <br />
            <input type="submit" value="Zarejestruj się" />
        </form>

    </body>
</html>


