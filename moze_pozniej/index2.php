<?php
    session_start();
    
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)){
        header('Location: main.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
       <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,firerox=1" /> -->
        <title>Osadnicy - gra przeglądarkowa</title>
    </head>
    <body>
        
        Tweeter<br /> <br />
        <form action="zaloguj.php" method="POST">
            
            Login: <br /><input type="text" name="login" /> <br />
            Hasło: <br /><input type="password" name="haslo" /> <br /> <br />
            <input type="submit" value="Zaloguj się" />
        </form>
<?php
if(isset($_SESSION['blad'])){

echo $_SESSION['blad'];

}
?>
        
    </body>
</html>
