<?php

    class File{

        //file(id,UserID,NameFiles,SizeFiles,PathFiles)
        private $UserID;
        private $NameFiles;
        private $SizeFiles;
        private $PathFiles;

        function __construct($User_ID,$Name_Files,$Size_Files,$Path_Files) {
            $this->UserID      = $User_ID;
            $this->NameFiles   = $Name_Files;
            $this->SizeFiles   = $Size_Files;
            $this->PathFiles   = $Size_Files;
        }


        function get_UserID(){
            return $this->UserID;
        }
        function get_NameFiles(){
            return $this->NameFiles;
        }
        function get_SizeFiles(){
            return $this->SizeFiles;
        }
        function get_PathFiles(){
            return $this->PathFiles;
        }



    }   