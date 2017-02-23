<?php

session_start();

if(!isset($_SESSION['zalogowany'])){
    header('Location: index2.php');
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
        
<?php

echo "<p> Witaj " . $_SESSION['user']. ' ![ <a href="logout.php">Wyloguj się</a> ]</p>';


echo "<p><b>email</b>:".$_SESSION['email'];


?>
        
    </body>
</html>
