<?php

    class Utenti{


        private $name;
        private $lastname;
        private $birthday;
        private $email;
        private $nickname;
        private $password;


        function __construct($name,$lastname,$birthday,$email,$nickname,$password) {
   
            $this->name = $name;
            $this->lastname = $lastname;
            $this->birthday = $birthday;
            $this->email = $email;
            $this->nickname = $nickname;
            $this->password = $password;
        }



        function get_name(){
            return $this->name;
        }
        function get_lastname(){
            return $this->lastname;
        }
        function get_birthday(){
            return $this->birthday;
        }
        function get_email(){
            return $this->email;
        }
        function get_nickname(){
            return $this->nickname;
        }
        function get_password(){
            return $this->password;
        }



    }




?>