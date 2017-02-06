<?
    include('check_date.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>ลงทะเบียน</title>
    <script type="text/javascript" src="./script/css/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="./script/js/bootstrap.min.js"></script>
    <link href="./script/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
    
<body background="./script/img/bg.jpg">
<?
    if(isset($_REQUEST['status'])) {
        if($_REQUEST['status'] == 0) {
?>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>ERROR!</strong> Please fill in every fields!
                </div>
            </div>
<?
        } else if($_REQUEST['status'] == 1) {
?>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>ERROR!</strong> Both passwords are not matched!
                </div>
            </div>
<?
        }
    }
?>
    <div class="sign-in">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title"><font size="5"><b>ลงทะเบียน</b></font></div>
                    </div>
                    <div class="panel-body">
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label>รหัสประจำตัว</label><br>
                                <input type="text" class="form-control" placeholder="รหัสประจำตัว" name="user">
                            </div><br>
                            <div class="form-group">
                                <label>รหัสผ่าน</label><br>
                                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="pass">
                            </div><br>
                            <div class="form-group">
                                <label>ยืนยันรหัสผ่าน</label><br>
                                <input type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" name="pchk">
                            </div><br>
                            <div class="text-right">
                                <a href="index.php" button type="button" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <footer>
        <center class="dev">Developed by <a href="https://www.facebook.com/natchapolsrisang" target="_blank">UtopiaBeam</a>.</center>
    </footer>
</body>
</html>