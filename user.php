<?php

class User {
/*
CREATE TABLE User(
                        id INT AUTO_INCREMENT,
                          nick VARCHAR (255) UNIQUE  NOT NULL ,
                          hashed_password VARCHAR (60) not null,
                          description text,
                          PRIMARY KEY (id));

*/
//krok 1
private $id;
private $name;
private $desc;

//krok 2



    public function  __constructor(){
        $this->id=-1;
        $this->name="";
        $this->desc="";
    }

    public  function login(mysqli $conn, $name, $insertedPassword){
        $sqlGetUser = "SELECT * FROM User WhERE nick = '".$name."'";
        $result = $conn->query($sqlGetUser);
        if($result->num_rows===1){
            $userData= $result->fetch_assoc();
            if(password_verify($insertedPassword,$userData["hashed_password"])){
                $this->id=$userData["id"];
                $this->name=$userData["nick"];
                $this->desc=$userData["description"];
            }else{
                echo" Wrong name or password";

            }

        }
        else{
            echo" Error during logging .. <br>";
            echo" Error : ".$conn->error."" ;

        }
    }
    public function showUser(){
        echo("User:" .$this->name."<br> Desc: ".$this->desc."<br>");
    }

    public function generateLinkToMyPage(){

        return "<a href=http://localhost/workshop/src/show_user.php?user_id='".$this->id."'>'".$this->name."</a>";
    }

    public  function loadFromDB(mysqli $conn, $idToLoad){
        $slqLoadUser = "SELECT * FROM User WHERE id=".$idToLoad;
        $result =$conn->query($slqLoadUser);

        if ($result->num_rows === 1){
            $userData= $result->fetch_assoc();

            $this->id = $userData["id"];
            $this->name = $userData["nick"];
            $this->desc = $userData["description"];
        }else{
            echo"error during logging..<br>";
            echo"error: ".$conn->error."<br>";
        }
    }

    public function register(mysqli $conn, $name, $desc, $password, $password_2){
        if($password!= $password_2){
            echo("Password does not mach");
            return;
        }

        $options = [

            'cost' => 11,

            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];
        $hashedPas = password_hash($password, PASSWORD_BCRYPT, $options);
        $sqlInsertUser = "INSERT INTO User(nick, hashed_password, description) VALUES ('".$name."','".$hashedPas."','".$desc."')";
        $result = $conn->query($sqlInsertUser);
        if($result == TRUE){
            $this->id = $conn->insert_id;
            $this->name = $name ;
            $this->desc  = $desc;
        }else{
            echo("Error : ".$conn->error."<br>");
        }
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
      return $this->name;
    }
    public function setName($name)
    {
      $this->name = $name;
    }

    public function getAllPost(mysqli $conn, $numberOFPosts){
        $sql = "SELECT * FROM Tweets WHERE user_id = '".$this->id."' LIMIT ".$numberOFPosts;
        $result = $conn->query($sql);
        $retArray = array();
        if($result->num_rows>0){
            // to do : Stworzyc obiekty klasy tweet i dodac je do tablcy zwracanej z tej funckji.
        }

        return $retArray;
    }



    public function saveToDB(mysqli $conn, $newDesc, $newPass, $newPass2) {
        if($newPass !== $newPass2) {
            echo "Passwords doesn't match";
            return;
        }

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $hashedPas = password_hash( $newPass, PASSWORD_BCRYPT, $options);

        $sqlUpdateUser = "UPDATE Users hashed_password='".$hashedPas."',
                                       description='".$newDesc."'
                                        WHERE id=".$this->id;

        $result = $conn->query($sqlUpdateUser);
        if($result == TRUE) {
            $this->desc = $newDesc;
        }   else {
            echo ("Error: ".$conn->error."<br>");
        }
    }


    public function getDesc()
    {
        return $this->desc;
    }
    public function setDesc($desc)
    {
       $this->desc = $desc;
    }
}



?>
