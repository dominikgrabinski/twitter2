<?php

require 'Tweet.php';
require 'config.php';

$oneTweet = Tweet::loadTweetById($connection, 50);

$id = $oneTweet->getUserId();

$sql = "SELECT * FROM Users WHERE id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
echo '<table border="1px" style="width:100%">
    <tr>
          <th>Name: '.$row['username'].'</th>
          <th>Email: '.$row['email'].'</th>
          <th>Tweet: '.$oneTweet->getText().'</th> 
          <th>Data powstania tweetu: '.$oneTweet->getCreationDate().'</th>
          <th>Comments: </th>
    </tr>
        </table>';