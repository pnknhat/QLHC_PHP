<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once("phongban.php");
    ?>

    <div class="container">
        <div class="row">
            <?php
                include_once("v_header.php");
            ?>
        </div>

        <div class="row">
            <div class="col-md-4">
            <?php
                include_once("v_left.php");
            ?>
            </div>

            <div class="col-md-8">
                <fieldset>
                    <legend>Phòng Ban</legend>
                    <form action="quanlyphong.php">

                    </form>
                </fieldset>

                <fieldset>
                    <legend>Danh sách phòng ban</legend>
                    <?php
                        $pb = new phongban();
                        $ds = $pb -> ds_phong();
                        //print_r($ds); //hiển thị danh sách phòng
                        echo "<table class='table table-bordered'>";
                        echo "<tr><td>Mã phòng</td> <td>Tên phòng</td> <td>Viết Tắt</td> </tr>";
                        foreach ($ds as $item){
                            echo "<tr>";
                            echo "<td>$item[0]</td>";
                            echo "<td>$item[1]</td>";
                            echo "<td>$item[2]</td>";
                            echo "</tr>";                          
                        }
                        echo "</table>";
                    ?>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <?php
                include_once("v_footer.php");
            ?>
        </div>
    </div>
</body>
</html>