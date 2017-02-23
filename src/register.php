<?php
require_once 'config.php';
require_once 'User.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST)){
        $newUser = new User();
        $newUser->setUserName($_POST['userName']);
        $newUser->setEmail($_POST['email']);
        $newUser->setHashedPassword($_POST['hashedPassword']);
        $newUser->saveToDB($connection);
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


