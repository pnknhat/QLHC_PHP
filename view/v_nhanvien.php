<?php
    
    include_once("chucvu.php");
    include_once("phongban.php");
?>

<form action="quanlynhanvien.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        Tên Nhân Viên:
        <input type="text" name="txtname" id="form-control">
    </div>

    <div class="form-group">
        Username:
        <input type="text" name="txtuser" id="form-control">
    </div>

    <div class="form-group">
        Password:
        <input type="password" name="txtpass" id="form-control">
    </div>

    <div class="form-group">
        Phòng Ban:
        <select name="sphong" id="form-control">
            <?php
                $pb = new phongban();
                $dspb = $pb -> ds_phong();
                foreach($dspb as $p){
                    echo "<option value= $p[0]> $p[1] </option>"; 
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        Giới Tính:
        <select name="sgioitinh" id="form-control">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
        </select>
    </div>

    <div class="form-group">
        Ngày Sinh:
        <input type="date" name="txtdate" id="form-control">
    </div>
    <div class="form-group">
        Chức Vụ:
        <select name="schucvu" id="form-control">
            <?php
                $cv = new chucvu();
                $dscv = $cv -> ds_chucvu();
                foreach($dscv as $c){
                    echo "<option value=' ".$c['macv']." '> ".$c['chucvu']."</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        Hình ảnh:
        <input type="file" name="fupload" id="form-control">
    </div>
                
    <div class="form-group"> 
       <button type="submit" class="btn btn-primary" name="btnsubmit" >Thêm Mới</button> 
        
    </div>

</form>