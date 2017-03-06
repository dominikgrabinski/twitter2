<?php

require 'Tweet.php';
require 'config.php';
require 'Comment.php';
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$tweetId = $_POST['tweetIdTake'];
//var_dump($tweetId);
$tweet = Tweet::loadTweetById($connection, $tweetId);
$oneTweet = Tweet::loadTweetById($connection, $tweetId);
//var_dump($oneTweet);
$id = $oneTweet->getUserId();

$sql = "SELECT * FROM Users WHERE id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
echo '<table border="3px" style="width:100%">
        <tr>
          <th>Name: '.$row['username'].'</th>
          <th>Email: '.$row['email'].'</th>
          <th>Tweet: '.$oneTweet->getText().'</th> 
          <th>Data powstania tweetu: '.$oneTweet->getCreationDate().'</th>
          <th>Comments: </th>
         </tr>
      </table>';

$allComments = Comment::loadAllCommentsByPostId($connection, $tweet->getId());
        $allCommentsNew = array_reverse($allComments);
      // var_dump($allCommentsNew); 
       
       for($i = 0; $i<count($allCommentsNew); $i++){
           $userId = $allCommentsNew[$i]->getUserId();
           $sql2 = "SELECT id, email, username FROM Users WHERE id=$userId";
           $result2 = $connection->query($sql2);
           $row2 = $result2->fetch_assoc();
           
           echo '<table border="1px" color="green" width="100%"><tr>
               
                    <td> Od: '.$row2['username'].'</td>
                    <td> Data: '.$allCommentsNew[$i]->getCreationDate().'</td>
                    <td> Komentarz: '. $allCommentsNew[$i]->getText().'</td>
           
                </tr></table>';
       }

}