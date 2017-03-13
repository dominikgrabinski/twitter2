<?php

require 'User.php';
require 'config.php';
session_start();

$delUser = User::loadUserById($connection, $_SESSION['userID']);
$delUser->delete($connection);

echo "Użytkownik usunięty";

echo '<a href="login.php">Powrót do strony logowania</a>';
