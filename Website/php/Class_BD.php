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

    function get_max($id){
        $query = "SELECT MaxElab FROM utenti WHERE ID = '$id'";
        $query = $this->conn->prepare($query);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $temp_Max = $result["MaxElab"];
        return $temp_Max;
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

    function Elab_rimasti($temp_id){
        return $this->get_max($temp_id)- $this->N_elab($temp_id);
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

    . "WHERE UT.ID = CON.UserID AND CON.UserID='$id'";
    $query = $this->conn->prepare($sql);
    $query->execute();
    


    if($query->rowCount()>0){
        echo "<thead><tr><th class= \"text-left\">Name</th><th class= \"text-left\" >LastName</th><th class= \"text-left\">StartConn</th><th class= \"text-left\">EndConn</th></tr><thead>";
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$row["name"]."</td><td class= \"text-left\">".$row["lastname"]."</td><td class= \"text-left\">".$row["startConn"]."</td><td class= \"text-left\">".$row["endConn"]."</td></tr>";

        }

    }
  




    }

    function isa_convert_bytes_to_specified($bytes, $to, $decimal_places = 1) {
        $formulas = array(
            'K' => number_format($bytes / 1024, $decimal_places),
            'M' => number_format($bytes / 1048576, $decimal_places),
            'G' => number_format($bytes / 1073741824, $decimal_places)
        );
        return isset($formulas[$to]) ? $formulas[$to] : 0;
      }

      

    function get_MB($id){
        $sql = "SELECT sum(dimFi) as MB\n"

    . "FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U\n"

    . "WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID AND UtenteID ='$id' AND DAY(NOW()) =DAY(EL.data) \n"

    . "AND YEAR(NOW()) = YEAR(EL.data) AND MONTH(NOW()) = MONTH(EL.data)";
    $query = $this->conn->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $temp_id = $result["MB"];

    return $this->isa_convert_bytes_to_specified($temp_id,'M');

    }

    function Best_filtro(){
        $sql = "SELECT type, COUNT(*)AS n\n"

    . "FROM elaborazioni, filtri\n"

    . "WHERE elaborazioni.FiltroID = filtri.ID\n"

    . "GROUP BY filtri.Type limit 1 \n";

    $query = $this->conn->prepare($sql);
    $query->execute();
    if($query->rowCount()>0){
        echo "<thead><tr><th class= \"text-left\">type</th><th class= \"text-left\" >N-volte</th></tr><thead>";
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$row["type"]."</td><td class= \"text-left\">".$row["n"]."</td></tr>";

        }

    }
  


    }

    function utenti_senza_elab(){
        $sql = "SELECT name,lastname ,utenti.email\n"

    . "FROM utenti\n"

    . "WHERE email NOT IN (\n"

    . "    SELECT email\n"

    . "    FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U\n"

    . "    WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID  \n"

    . ")";
    $query = $this->conn->prepare($sql);
    $query->execute();
    if($query->rowCount()>0){
        echo "<thead><tr><th class= \"text-left\">nome</th><th class= \"text-left\">cognome</th><th class= \"text-left\" >Nemail</th></tr><thead>";
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td class= \"text-left\" >".$row["name"]."</td><td class= \"text-left\" >".$row["lastname"]."</td><td class= \"text-left\">".$row["email"]."</td></tr>";

        }

    }
  




    }

    function get_past_month_access(){
        $sql = "SELECT COUNT(*)AS N_conn\n"

        . "FROM connessioni\n"
    
        . "WHERE\n"
    
        . "YEAR(startConn) = YEAR(CURDATE() - INTERVAL 1 MONTH)\n"
    
        . "AND MONTH(startConn) = MONTH(CURDATE() - INTERVAL 1 MONTH)";
        $query = $this->conn->prepare($sql);
        $query->execute();

        if($query->rowCount()>0){
            echo "<thead><tr><th class= \"text-left\" >Numero accessi</th></tr><thead>";
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td class= \"text-left\" >".$row["N_conn"]."</td></tr>";
    
            }
    
        }





    }

    function get_past_month_elab(){
        $sql = "SELECT COUNT(*)AS N_elab\n"

        . "FROM elaborazioni\n"
    
        . "WHERE\n"
    
        . "YEAR(data) = YEAR(CURDATE() - INTERVAL 1 MONTH)\n"
    
        . "AND MONTH(Data) = MONTH(CURDATE() - INTERVAL 1 MONTH)";
    $query = $this->conn->prepare($sql);
    $query->execute();

    if($query->rowCount()>0){
        echo "<thead><tr><th class= \"text-left\" >Numero Elaborazioni</th></tr><thead>";
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td class= \"text-left\" >".$row["N_elab"]."</td></tr>";

        }

    }
    

    }

    function close_db(){
        $this->conn = null;
    }

}


?>