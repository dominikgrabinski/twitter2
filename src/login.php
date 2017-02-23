<?php
require_once 'config.php';

if ($connection->connect_errno!=0){
    echo "Error: " .$connection->connect_errno;
}else{
    
}
?>
<html>
    <head>
        <title>Formularz logowania</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
                
        Tweeter<br /> <br />
        <form action="login.php" method="POST">
            Nazwa użytkownika:  <br /><input type="text" name="userName" /> <br />
            Hasło:              <br /><input type="password" name="hashedPassword" /> <br /> <br />
            <input type="submit" value="Zaloguj się" />
        </form>

    </body>
</html>


