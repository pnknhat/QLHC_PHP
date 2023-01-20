<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script>
        window.onload = function() {
            var pb = document.getElementsByName("sphong");
            pb[0].onchange = function (e) {
                var id = e.currentTarget.value; //lấy mã pb
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if(this.status == 200 && this.readyState == 4){
                        // xử lý dữ liệu
                        //alert(this.responseText);
                        var data = JSON.parse(this.responseText);
                        var strText= "<tr><th>Mã NV</th> <th>Tên NV</th> <th>Phòng</th> <th>Chức vu</th> </tr>";
                        if(data.lenght > 0){
                            for(i = 0; i < data.lenght; i++){
                                strText +="<tr>";
                                strText += "<td>" +data[i].manv+ "</td>"
                                strText += "<td>" +data[i].tennv+ "</td>"
                                strText += "<td>" +data[i].tenphong+ "</td>"
                                strText += "<td>" +data[i].chucvu +"</td>"
                                strText += "</tr>";
                            }
                        }
                        else{
                            strText += "<tr> <td colspan = '4'> Không có nhân viên nào </tr>"
                        }
                        document.getElementById("tblNV").innerHTML = strText;
                    }
                    
                }     
                xmlhttp.open("GET","responsepage.php?id=" +id,true);
                xmlhttp.send(); // thuộc tính readystate bắt đầu thay đổi ==> sự kiện onreadystatechange xảy ra         
            }
        }
        
    </script>
</head>
<body>
    <?php include_once("phongban.php"); ?>
    <form action="" class="m-2">
        <div class="form-group">
            Phòng Ban:
            <select name="sphong" class="form-control col-5">
                <?php
                    $pb = new phongban();
                    $dspb = $pb -> ds_phong();
                    foreach($dspb as $p){
                        echo "<option value= $p[0]> $p[1] </option>"; 
                    }
                ?>
            </select>
        </div>

        <div clas="form-group">
            <table id="tblNV" class="table table-bordered">

            </table>
        </div>
    </form>
</body>
</html>