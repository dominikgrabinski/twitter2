<?php
require_once 'Comment.php';
require_once 'config.php';
require_once 'Tweet.php';
session_start();

if(!empty($_POST['comment'])){
    $newComment = new Comment();
    $newComment->setPostId($_POST['postId']);
    $newComment->setUserId($_SESSION['userID']);
    $newComment->setCreationDate(2017);
    $newComment->setText($_POST['comment']);
    $newComment->saveToDB($connection);
    
    echo "Wysyłam do DB";
    header("refresh:2;url=MainTweeter.php");
    
}else{
    echo "Błąd wysyłania";
}

