<?php

class Manager_DB{
    // PDO connect
    public $hostname = "";
    public $user = "";
    public $password = "";
    public $dbname = "";
    private $conn;

    function __construct($name_host,$nome,$pass,$dbname)
    {
        $this->hostname = $name_host;
        $this->user = $nome;
        $this->password = $pass;
        $this->dbname = $dbname;

        $this->init();
    }

    //query

    function init(){
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->user, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {
            $this->conn = null;
            echo "Connection failed: " . $e->getMessage();
            
            }
    }

    

    function Check_email($email){
        $check_email = "select * from utenti where email = '$email'";
        $check_email = $this->conn->prepare($check_email);
        $check_email->execute();

        if($check_email->rowCount() != 0){
            return false;   
        }else{
            return true;
        }
    }

    function Load_file(){
        
    }

    
    function MyQuery($e){
        $query = $e;
        $query = $this->conn->prepare($query);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    
    function Add_NeWuser($name,$lastname,$birthday,$email,$nickname,$password){

        $query = "INSERT INTO utenti(name,lastname,birthday,email,nickname,password) VALUES ('$name','$lastname','$birthday','$email','$nickname','$password')";
        $query = $this->conn->prepare($query);
        $query->execute();

    }


    function get_id($email){
        $query = "SELECT ID FROM utenti WHERE email = '$email'";
        $query = $this->conn->prepare($query);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_id = $result["ID"];
        return $temp_id;
    }

    function get_password($email){
        $user_id = $this->get_id($email);
        $query = "SELECT password FROM utenti WHERE id = '$user_id'";
        $query = $this->conn->prepare($query);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_password = $result["password"];
        return $temp_password;
    }


    function get_nickname($email){
        $query = "SELECT nickname FROM utenti WHERE email = '$email'";
        $query = $this->conn->prepare($query);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_nick = $result["nickname"];
        return $temp_nick;
    }


   
    function close_db(){
        $this->conn = null;
    }

}


?>