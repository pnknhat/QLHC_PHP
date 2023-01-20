<?php
    class data {
        var $mDB = null; //thuoc tinh chua doi tuong connection den DB
        function __construct(){} //ham dung
        public function getDB(){ //phuong thuc ket noi voi csdl
            if(!isset($this -> mDB)){
                $this -> mDB = new mysqli('localhost', 'root', '','qlhc');
            }
            return $this -> mDB;
        }
        public function getDBPDO(){
            if(!isset($this->mDB)){
                $this->mDB = new PDO('mysql:host=localhost; dbname=qlhc; charset=utf8','root','');
            }
            return $this->mDB;
        }
    }
?>