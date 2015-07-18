<?php


class Tweets {

    PRIVATE $id;
    PRIVATE $id_usera;
    PRIVATE $text;
    PRIVATE $id_postu;
    PRIVATE $creation_date;

    public function __construct(){

        $this->id=-1;
        $this->id_usera="";
        $this->text="";
        $this->id_postu="";
    }

    public function loadFromDB(mysqli $conn,$idToLoad ){
        $slqLoadUser = "SELECT * FROM tweets WHERE id=".$idToLoad;
        $result =$conn->query($slqLoadUser);

        if ($result->num_rows === 1){
            $userData= $result->fetch_assoc();

            $this->id = $userData["id"];
            $this->id_usera = $userData["id_usera"];
            $this->text = $userData["text"];
            $this->id_postu = $userData["id_postu"];

        }else{
            echo"error during logging..<br>";
            echo"error: ".$conn->error."<br>";
        }
    }


    public function setCreation_Date($creation_date){
        $this->creation_date=$creation_date;
    }

    public function setId_Usera($id_usera){
        $this->id_usera=$id_usera;
    }

    public  function getId_usera(){
        return $this->id_usera;
    }

    public function setText($text){
        $this->text=$text;
    }

    public function getText(){
        return $this->text;
    }
    public function getId(){
        return $this->id;
    }
    public function getId_postu(){
        return $this->id_postu;
    }
}
?>


