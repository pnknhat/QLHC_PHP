<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<body>
    <ul class="list-group">
        <?php
        session_start();
            $username = "";
            if(isset($_POST["txtuser"]) && isset($_POST["txtpass"])){
                $username = $_POST["txtuser"];
                $connect = new mysqli('localhost', 'root', '','qlhc');
                $query = "select * from nhanvien where username = ? and password=?";
                $pre = $connect ->prepare($query);
                $pre -> bind_param("s", $username);
                $pre -> bind_param("s", $_POST["txtpass"]);
                $kq = $pre -> execute();
                
                $_SESSION["name"] = $username;
                $check = empty($_POST["chkRem"])? "":"checked";
                if($check!="")
                    setcookie("mysite", $username, time()+60*60);
            }

            if( $username!=" " || isset($_SESSION["name"]) ){
                $username == ($username=="") ? $_SESSION["name"]: $username;;
                echo "<li class='list-group-item'> user: $username </li>";
                echo "<li class='list-group-item'> <a href='thanhvien.php?p=out'> Thoát </a> </li>";
            }
            else{
                header("location:thanhvien.php");
            }
        ?>
    </ul>
</body>
</html>