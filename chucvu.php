<?php
    include_once("db.php");
    class chucvu{
        var $dbconnect;
        public function __construct(){}
        public function ds_chucvu(){
            $db = new data();
            $this -> dbconnect = $db -> getDBPDO();
            $query = "select * from chucvu";
            $kq = $this -> dbconnect -> query($query);
            return $kq -> fetchAll();
        }
    }

?>