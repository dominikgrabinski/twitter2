<?php

require_once 'Tweet.php';
require_once 'config.php';

    if(!empty($_POST['tweet'])){
        $newTweet = new Tweet();
        $newTweet->setUserId(3);
        $newTweet->setCreationDate(2017);
        $newTweet->setText($_POST['tweet']);
        $newTweet->saveToDB($connection);
        
        echo "Wysłano do db";
        header("refresh:2;url=MainTweeter.php");
        }else{
        
            echo "nie poszło";
    }
