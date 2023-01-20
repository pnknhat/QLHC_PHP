<?php
header("Content-Type:application/json");
    include_once("nhanvien.php");
    $id = $_REQUEST["id"];
    $nv = new nhanvien();
    $ds = $nv -> ds_nhanvien_maphong($id);

    echo json_encode($ds);
?>