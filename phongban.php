<?php
    include_once("db.php");
    class phongban{
        var $dbconnect;
        public function __construct(){}
        public function ds_phong(){
            $db = new data();
            $this -> dbconnect = $db -> getDB(); //tra ve doi tuong mysqli
            $query = "select * from phongban";
            $kq = $this -> dbconnect -> query($query);
            return $kq -> fetch_all();
        }
    }

?>