<?php

require 'config.php';

class Message {
    private $id;
    private $userId;
    private $creationDate;
    private $text;
    private $messageFrom;
    private $readed;
    
    public function __construct() {
        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
        $this->messageFrom = "";
        $this->readed = 1;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setUserId($userId){
        $this->userId= $userId;
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
    
    public function setCreationDate(){
        $this->creationDate = date('Y-m-d H:i:s');
    }
    
    public function getCreationDate(){
        return $this->creationDate;
    }
    
    public function setMessageFrom($messageId){
        $this->messageFrom= $messageId;
    }
    
    public function getMessageFrom(){
        return $this->messageFrom;
    }
    
    public function setReaded($readed){
        $this->readed = $readed;
    }
    
    public function getReaded(){
        return $this->readed;
    }    
    
    public function saveToDB(mysqli $connection){
        
        if($this->id == -1){
            $sql = "INSERT INTO Message(userId, creationDate, text, messageFrom, readed) VALUES('$this->userId', '$this->creationDate', '$this->text', '$this->messageFrom', '$this->readed')";
            
            $result = $connection->query($sql);
            $this->id = $connection->insert_id;
            return $result == true;
            
        }else{
            $sql = "UPDATE Message SET readed=$this->readed WHERE id=$this->id";
            $result = $connection->query($sql);
        }
    }
    
    static public function loadMessageByUserId(mysqli $connection, $userId){
        $sql = "SELECT * FROM Message WHERE userId=$userId";
        $result = $connection->query($sql);
        $ret = [];
        if($result == TRUE && $result->num_rows != 0){
            foreach($result as $row){
            
            $loadMessage = new Message();
            $loadMessage->id = $row['id'];
            $loadMessage->userId = $row['userId'];
            $loadMessage->creationDate = $row['creationDate'];
            $loadMessage->text = $row['text'];
            $loadMessage->messageFrom = $row['messageFrom'];
            $loadMessage->readed = $row['readed'];
            
            $ret[] = $loadMessage;
            }            
        }
        return $ret;
    }  
    
    static public function loadMessageById(mysqli $connection, $id){
        $sql = "SELECT * FROM Message WHERE id=$id";
        
        $result = $connection->query($sql);
        if ($result == TRUE && $result->num_rows !=0){
            foreach ($result as $row){
                $oMessage = new Message();
                $oMessage->userId = $row['userId'];
                $oMessage->messageFrom = $row['messageFrom'];
                $oMessage->text = $row['text'];
                $oMessage->creationDate = $row['creationDate'];
                $oMessage->id = $row['id'];
            
                return $oMessage;
            }
        }
        return null;
    }
    
}

//$oMassage = new Message();
//$oMassage->setUserId(19);
//$oMassage->setMessageId(8);
//$oMassage->setCreationDate();
//$oMassage->setText('sprawdzamy 3 mes');
//
//$oMassage->saveToDB($connection);

//$checkMessage = Message::loadMessageById($connection, 13);
//var_dump($checkMessage);

