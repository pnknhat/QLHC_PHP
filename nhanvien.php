<?php
    include_once("db.php");
    class nhanvien{
        var $dbconnect;
        public function __construct(){}
        public function ds_nhanvien(){
            $db = new data();
            $this -> dbconnect = $db -> getDBPDO();
            $query = "SELECT nv.*, p.tenphong, c.chucvu, p.viettat
            FROM `nhanvien` nv,phongban p,chucvu c 
            WHERE nv.maphong = p.maphong AND nv.macv = c.macv";
            $kq = $this -> dbconnect -> query($query);
            return $kq -> fetchAll();
        }

        public function ds_nhanvien_maphong($maphong){
            $db = new data();
            $this -> dbconnect = $db -> getDBPDO();
            $query = "SELECT nv.*, p.tenphong, c.chucvu, p.viettat
            FROM `nhanvien` nv,phongban p,chucvu c 
            WHERE nv.maphong = p.maphong AND nv.macv = c.macv and nv.maphong=".$maphong;
            $kq = $this -> dbconnect -> query($query);
            return $kq -> fetchAll();
        }

        public function insert_nhanvien($ten, $user, $pass, $maphong, $gt, $ngaysinh, $macv, $hinh){
            $db = new data();
            $this -> dbconnect = $db -> getDBPDO();
            $query = "insert into nhanvien(manv, tennv, username, password, maphong, gioitinh, ngaysinh, macv, hinh)
                values (null, :ten, :user, :pass, :maphong, :gt, :ngaysinh, :macv, :hinh );";

            $stmt = $this ->dbconnect ->prepare($query);
            $stmt -> bindParam(":ten", $ten);
            $stmt -> bindParam(":user", $user);   
            $stmt -> bindParam(":pass", $pass);       
            $stmt -> bindParam(":maphong", $maphong);
            $stmt -> bindParam(":gt", $gt);
            $stmt -> bindParam(":ngaysinh", $ngaysinh);
            $stmt -> bindParam(":macv", $macv);
            $stmt -> bindParam(":hinh", $hinh);
            $kq = $stmt -> execute();
            $this -> dbconnect = null;
            return $kq;
        }
    }

?>