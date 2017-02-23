<?php

require 'config.php';

class Tweet {
    private $id;
    private $userId;
    private $text;
    private $creationDate;
    
    public function __construct() {
        $this->id = -1;
        $this->userId = "";
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
            
            $sql = "INSERT INTO Tweet(userId, text, creationDate) VALUES ('$this->userId', '$this->text', '$this->creationDate')";
            
            $result = $connection->query($sql);
            
            if ($result == true){
                $this->id = $connection->insert_id;
                return true;
            }
        }else{
            $sql = "UPDATE Tweet SET userId='$this->userId', text='$this->text', creationDate = '$this->creationDate' WHERE id=$this->id";
       
            $result = $connection->query($sql);
            if($result == true){
                return true;
            }
         }
         return false;
    }
    
    static public function loadTweetById(mysqli $connection, $id){
        $sql = "SELECT * FROM Tweet WHERE id=$id";
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows == 1){
            $row = $result->fetch_assoc();
            
            $loadTweet = new Tweet();
            $loadTweet->id = $row['id'];
            $loadTweet->userId = $row['userId'];
            $loadTweet->text = $row['text'];
            $loadTweet->creationDate = $row['creationDate'];
            
            return $loadTweet;
            
        }
        return NULL;
    }
    
    static public function loadAllTweets(mysqli $connection){
        $sql = "SELECT * FROM Tweet";
        $ret = [];
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows != 0){
            foreach($result as $row){
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
    
    static public function loadAllTweetsByUserId(mysqli $connection, $userId){
        $sql = "SELECT * FROM Tweet WHERE userId=$userId";
        $ret = [];
        
    $result = $connection->query($sql);
        if($result == true && $result->num_rows != 0){
            foreach($result as $row){
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
}

//$oTweet = new Tweet();
//
//$oTweet->setUserId(100);
//$oTweet->setText("To jest dddddd");
//$oTweet->setCreationDate('2017');
//$oTweet->saveToDB($connection);
//var_dump($oTweet);

//var_dump(Tweet::loadAllTweetsByUserId($connection, 1));

