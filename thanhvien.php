<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form action="home1.php" method="post" class="form-inline"> 
            <div class="form-group">
                Thành Viên
            </div>
            <div class="form-group">
                <lable class="col-md-6">Username</lable>
                <input type="text" name="txtuser" clas="form-control">
            </div>

            <div class="form-group">
                <lable class="col-md-6">Pass</lable>
                <input type="password" name="txtpass" clas="form-control">
            </div>

            <div class="form-group">
                <lable class="col-md-6">Ghi Nhớ</lable>
                <input type="checkbox" name="chkRem" clas="checkbox-inline">
            </div>

            <div class="form-group">
                <input type="submit" name="btnDangky" clas="btn btn-primary">
            </div>
            
        </form>
    </div>
</body>
</html>