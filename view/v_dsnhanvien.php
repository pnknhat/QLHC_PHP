<?php
    include_once('./nhanvien.php');
?>
<table class="table table-bordered">
    <tr>
        <th>Mã NV</th>
        <th>Tên NV</th>
        <th>User</th>
        <th>Phòng</th>
        <th>Giới Tính</th>
        <th>Ngày Sinh</th>
        <th>Chức Vụ</th>   
        <th>Hình ảnh</th> 
        <th>Delete/Update</th>   
    </tr>
    <?php
        $nv = new nhanvien();
        $arr = $nv -> ds_nhanvien();
        foreach ($arr as $item){
            echo "<tr>";
            echo "<td>".$item['manv']."</td>";
            echo "<td>".$item['tennv']."</td>";
            echo "<td>".$item['username']."</td>";
            echo "<td>".$item['tenphong']."</td>";
            if($item['gioitinh'] ==1)
                echo "<td>Nam</td>";              
            else  echo "<td>Nữ<td>";
            echo "<td>" .date("d-m-y", strtotime($item['ngaysinh']))."</td>";
            echo "<td>".$item['chucvu']."</td>";
            echo "<td> <img class='img-thumbnail' src='files/".$item['hinh']. "'></td>";
            echo "<td></td>";
            echo "</tr>";          
        }
    ?>
</table>