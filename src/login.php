<?php
require_once 'config.php';
require_once 'User.php';
session_start();

  if(!empty($_POST['email'])){

    if (!empty($_POST['password'])){
      $user = new User();
      $pass = $user->setHashedPassword($_POST['password']);

      $query="SELECT COUNT(*) as ilosc,id,username,email FROM Users WHERE email='".$_POST['email']."' AND hashed_password='$pass'";
      $result = $connection->query($query);
      $row = $result->fetch_assoc();

//      var_dump($row);
    //      var_dump($result);
          if($row['ilosc'] == 1 ){
            // session_regenerate_id();
            //$_SESSION['userIP'] = $_SERVER['REMOTE_IP'];
            $_SESSION['userID'] = $row['id'];
            $_SESSION['userName'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            echo "Trwa przekierowanie na strone główna";
            header( "refresh:1;url=MainTweeter.php" );
          }
          else
          {
            echo "złe dane<br>";
          }

    }
    else{
      echo "Podaj poprawne hasło !!<br>";
   //   header('refresh:2; url=login.php');
    }

  }
  else{
   echo "Podaj poprawny email <br>";
   //header('refresh:2; url=login.php');
  }
  
  
  
  
//session_start();
//
//if((!empty($_POST['userName'])) || (!empty($_POST['hashedPassword']))){
//    $user = new User();
//    $pass = $user->setHashedPassword($_POST['hashedPassword']);
//    //var_dump($_POST['userName']);
//    //var_dump($_POST['hashedPassword']);
//    $sql = "SELECT COUNT(*) as ilosc FROM Users WHERE username='".$_POST['userName']."' AND hashed_password='$pass'";
//   $result = $connection->query($sql);
//      $row = $result->fetch_assoc();
////      var_dump($row);
////      var_dump($result);
//    if($row['ilosc'] == 1){
//        $_SESSION['userId'] = $_POST['userName'];
//        echo "Przekierowanie do strony głównej";
//        header('Location: MainTweeter.php');
//    }
//}
?>
<html>
    <head>
        <title>Formularz logowania</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
                
        <h1>Tweeter</h1>
            <br /> <br />
        <form action="login.php" method="POST">
            Email użytkownika:  <br /><input type="text" name="email" /> <br />
            Hasło:              <br /><input type="password" name="password" /> <br /> <br />
            <input type="submit" value="Zaloguj się" />
        </form>
        
        <a href="register.php">Jeśli nie posiadasz konta, kliknuj tutaj</a>

    </body>
</html>


