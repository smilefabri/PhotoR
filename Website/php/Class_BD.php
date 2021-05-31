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

    function set_ReConn($id,$Inziodata,$Finedata){
        
        $query = "INSERT INTO connessioni(UserID,startConn,endConn) VALUES ('$id','$Inziodata','$Finedata')";
        $query = $this->conn->prepare($query);
        $query->execute();
    }

    function Add_file($UserID,$nameFiles,$SizeFiles,$pathfiles){
        $UserID = intval($UserID);
        $query = "INSERT INTO tabelfiles(utenteID,nomeFi,dimFi,perFi) VALUES ('$UserID','$nameFiles','$SizeFiles','$pathfiles' )";
        $query = $this->conn->prepare($query);
        $query->execute();
    }

    function Add_elab($IDfiles,$IDfiltro){
        $query = "INSERT INTO elaborazioni(FileID,FiltroID,Data) VALUES ('$IDfiles','$IDfiltro',NOW())";

        $query = $this->conn->prepare($query);
        $query->execute();
    }

    function filtroID_by_name($name){
        $query = "SELECT ID FROM filtri WHERE type = '$name'";
        $query = $this->conn->prepare($query);
        $query->execute();
        if($query->rowCount() != 0 ){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $temp_id = $result["ID"];
            return $temp_id;
        }else{
            return null;
        }

        
    }

    function N_elab($id){
        $sql = "SELECT COUNT(*) as ID\n"

    . "FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U\n"

    . "WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID AND UtenteID ='$id' AND DAY(NOW()) = DAY(EL.data) \n"

    . "AND YEAR(NOW()) = YEAR(EL.data) AND MONTH(NOW()) = MONTH(EL.data)";

    $query = $this->conn->prepare($sql);
    $query->execute();
    if($query->rowCount() != 0 ){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_id = $result["ID"];
        return $temp_id;
    }else{
        return null;
    }

    }


    function get_File_ID($path){
        $query = "SELECT ID FROM tabelfiles WHERE perFi = '$path' ";
        $query = $this->conn->prepare($query);
        $query->execute();
        if($query->rowCount() != 0 ){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $temp_id = $result["ID"];
            return $temp_id;
        }else{
            return null;
        }

        
    }


    function All_conn($id){
        $sql = "SELECT UT.name, UT.lastname,startConn,endConn \n"

    . "FROM connessioni CON,utenti UT\n"

    . "WHERE UT.ID = CON.UserID AND UT.ID='$id'";
    $query = $this->conn->prepare($sql);
    $query->execute();
    if($query->rowCount() != 0 ){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_id = $result;
        return $temp_id;
    }else{
        return null;
    }


    }


   
    function close_db(){
        $this->conn = null;
    }

}


?>