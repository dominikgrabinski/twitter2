<?php

require 'config.php';

class User {
    private $id;
    private $userName;
    private $hashedPassword;
    private $email;
    
    public function __construct() {
        $this->id = -1;
        $this->userName = "";
        $this->hashedPassword = "";
        $this->email = "";
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setUserName($userName){
        $this->userName = $userName;        
    }
    
    public function getUserName(){
        return $this->userName;
    }
    public function setEmail($mail){
        $this->email = $mail;        
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setHashedPassword($newPassword){
    $hashedNewPassword =
    hash('sha256',$newPassword);
    return $this->hashedPassword = $hashedNewPassword;
    }
    
    public function getPassword(){
        return $this->hashedPassword;
    }
    
    public function samePassword($newPassword) {
        $newHashedPassword = $newPassword;
        return $this->hashedPassword = $newHashedPassword;
    }
    /**
     * Funkcja sprawdzająca poprawność hasła
     * 
     * @return bool Czy hasło poprawne
     */
    public function checkHashedPassword($passwordToCheck){
        if(password_verify($passwordToCheck, $this->hashedPassword)){

            return true;
 
        }else{
 
            return false;

        }
    }
    
    public function saveToDB(mysqli $connection){
        if($this->id == -1){
            
            
            $sql = "INSERT INTO Users(username, email, hashed_password) VALUES ('$this->userName', '$this->email', '$this->hashedPassword')";
            
            $result = $connection->query($sql);
            
            if ($result == true){
                $this->id = $connection->insert_id;
                return true;
            }
        }else{
            $sql = "UPDATE Users SET username='$this->userName', email='$this->email', hashed_password='$this->hashedPassword' WHERE id=$this->id";
            
            $result = $connection->query($sql);
            if($result == true){
                return true;
            }
            
        }
        return false;
    }   
  
    static public function loadUserById(mysqli $connection, $id){
        $sql = "SELECT * FROM Users WHERE id=$id";
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows == 1){
            $row = $result->fetch_assoc();
            
            $loadUser = new User();
            $loadUser->id = $row['id'];
            $loadUser->userName = $row['username'];
            $loadUser->hashedPassword = $row['hashed_password'];
            $loadUser->email = $row['email'];
            
            return $loadUser;
            
        }
        return NULL;
    }
    
    static public function loadAllUsers(mysqli $connection){
        $sql = "SELECT * FROM Users";
        $ret = [];
        
        $result = $connection->query($sql);
        if($result == true && $result->num_rows != 0){
            foreach($result as $row){
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->userName = $row['username'];
                $loadedUser->hashedPassword = $row['hashed_password'];
                $loadedUser->email = $row['email'];
                
                $ret[] = $loadedUser;
                
                
            }
        }
        return $ret;
    }
    
    public function delete(mysqli $connection){
        if($this->id != -1){
            $sql = "DELETE FROM Users WHERE id=$this->id";
            $result = $connection->query($sql);
            if($result == true){
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
    
}

//$User1 = new User();
//
//$User1->setEmail('ania@mail.com');
//$User1->setHashedPassword('ania');
//$User1->setUserName('ania');
//
//$User1->saveToDB($connection);


//$changeUserId1 = User::loadUserById($connection, 1);
////$changeUserId1->getUserName();
//$changeUserId1->setUserName('dominiczek');
//$changeUserId1->saveToDB($connection);
//
//var_dump(User::loadUserById($connection, 1));

//$deleteUser = User::loadUserById($connection, 2);
//$deleteUser->delete($connection);
//var_dump($deleteUser);






//var_dump(User::loadAllUsers($connection));





        





