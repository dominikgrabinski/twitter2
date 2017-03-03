<?php

require 'config.php';

class Comment {
    
    private $id;
    private $userId;
    private $postId;
    private $creationDate;
    private $text;
    
    public function __construct() {
        $this->id = -1;
        $this->userId = "";
        $this->postId = "";
        $this->text = "";
        $this->creationDate = "";
    }
    
    public function getId(){
        return $this->id;   
    }
    
    public function setUserId($userId){
        $this->userId = $userId;
    }
    
    public function getUserId(){
        return $this->userId;
    }
    
        public function setPostId($postId){
        $this->postId = $postId;
    }
    
    public function getPostId(){
        return $this->postId;
    }
    
    public function setText($text){
        $this->text = $text;
    }
    
    public function getText(){
        return $this->text;
    }
    
    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate  = date('Y-m-d H:i:s');
        return $this;
    }
    
    public function getCreationDate(){
        return $this->creationDate;
    }
    
    public function saveToDB(mysqli $connection){
        
        if($this->id == -1){
            
            $sql = "INSERT INTO Comment(userId, postId, creationDate, text) VALUES('$this->userId', '$this->postId', '$this->creationDate', '$this->text')";
            
            $result = $connection->query($sql);
            
            if ($result == true){
                $this->id = $connection->insert_id;
                return true;
            }
        }else{
            $sql = "UPDATE Comment SET userId='$this->userId', postId='$this->postId', creationDate = '$this->creationDate', text='$this->text' WHERE id=$this->id";
       
            $result = $connection->query($sql);
            if($result == true){
                return true;
            }
         }
         return false;
    }
        
    
    
    static public function loadCommentById(mysqli $connection, $id){
        $sql = "SELECT * FROM Comment WHERE id=$id";
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows == 1){
            $row = $result->fetch_assoc();
            
            $loadTweet = new Comment();
            $loadTweet->postId = $row['postId'];
            $loadTweet->userId = $row['userId'];
            $loadTweet->text = $row['text'];
            $loadTweet->creationDate = $row['creationDate'];
            
            return $loadTweet;
            
        }
        return NULL;
    }
    
    static public function loadAllCommentsByPostId(mysqli $connection, $postId){
        $sql = "SELECT * FROM Comment WHERE postId=$postId";
        $ret = [];
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows != 0){
            foreach ($result as $row){
            
            $loadCommentsByUserId = new Comment();
            $loadCommentsByUserId->postId = $row['postId'];
            $loadCommentsByUserId->userId = $row['userId'];
            $loadCommentsByUserId->text = $row['text'];
            $loadCommentsByUserId->creationDate = $row['creationDate'];
            
            $ret[] = $loadCommentsByUserId;
            }
        }
        return $ret;
    }
    
}

//$oComment = new Comment();
//
//$oComment->setPostId(1);
//$oComment->setText('ihklhklhhjk');
//$oComment->setCreationDate('2017-02-22');
//$oComment->setUserId(1);
//$oComment->saveToDB($connection);
//var_dump($oComment);

//var_dump(Comment::loadAllCommentsByPostId($connection, 1));

//var_dump(Comment::loadCommentById($connection, 3));

//$com2 = new Comment();
//
//$com2->setPostId(2);
//$com2->setText('sprawdzamy dla postId = 2 dla useraId = 1');
//$com2->setUserId(1);
//$com2->setCreationDate(2017-01-01);
//$com2->saveToDB($connection);
//var_dump($com2);

//var_dump($connection);