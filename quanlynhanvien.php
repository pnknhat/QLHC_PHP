<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<?php
    include_once("nhanvien.php");
?>
<body>

    <div class="container">
        <div class="row">
            <?php
                include_once("V_header.php");  //header
            ?>
           
        </div>

        <div class="row">
            <div class="col-4">
            <?php
                include_once("v_left.php");    //left
            ?>
            </div>

            <div class="col-8"> 
                <div>
                    <?php //left
                        if($_SERVER['REQUEST_METHOD'] === 'GET'){
                            include_once('view/v_nhanvien.php');
                        }
                        else{
                            if(isset($_REQUEST["btnsubmit"])){
                                $name = $_REQUEST["txtname"];
                                $user = $_REQUEST["txtuser"];
                                $pass = $_REQUEST["txtpass"];
                                $phong = $_REQUEST["sphong"];
                                $gt = $_REQUEST["sgioitinh"];
                                $cv = $_REQUEST["schucvu"];
                                $ngaysinh =date('Y-m-d', strtotime($_REQUEST["txtdate"]));                             
                                $tenfile ="";
                                if(!empty($_FILES['fupload']['name'])){
                                    $tenfile = $_FILES['fupload']['name'];
                                    $tmp = $_FILES['fupload']['tmp_name'];
                                    move_uploaded_file($tmp,'files/'.$tenfile);
                                }
                                if($tenfile ="") $tenfile = "default.jpg";
                                $nv = new nhanvien();
                                $kq = $nv -> insert_nhanvien($name, $user, $pass, $phong, $gt, $ngaysinh, $cv, $tenfile);  
                                include_once('view/v_nhanvien.php');
                            }
                        }
                    ?>
                </div>

                <div>
                <?php //left
                        // if($_SERVER['REQUEST_METHOD'] === 'GET'){
                             include_once('view/v_dsnhanvien.php');
                        // }
                    ?>
                </div>
                <?php 

                ?>
            </div>
        </div>

        <div class="row">
        <?php
                include_once("v_footer.php");   //footer 
            ?>
        </div>
    </div>
</body>
</html>