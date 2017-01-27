<?
    session_start();
    include('check_date.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>ระบบจองห้องสควอช</title>
    <script type="text/javascript" src="./script/css/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="./script/js/bootstrap.min.js"></script>
    <link href="./script/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
    
<body background="./script/img/bg.jpg">
    <nav class="nav navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="profile.php" class="navbar-brand">Squash</a>
            </div>
            <div class="col-sm-1"></div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="">Booking</a></li>
                    <li><a href="announce.php">Annoucement</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <button type="button" class="btn btn-primary navbar-btn dropdown-toggle" data-toggle="dropdown">
                            Signed in as <? echo $_SESSION['user']; ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="sign_out.php">Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="col-md-6">
        <div class="panel panel-primary rule">
            <div class="panel-heading"><font size="5">กฎในการจองห้องสควอช</font></div>
            <div class="panel-body">
                <li>สามารถจองห้องได้<u style="color: red">เพียงห้องเดียว</u>เท่านั้น</li><br>
                <li>สามารถจองได่<u style="color:red">วันต่อวัน</u>เท่านั้น (ไม่สามารถจองล่วงหน้าเกินหนึ่งวัน)</li><br>
                <li>สามารถจองได้<u style="color: red">เพียงวันละครั้ง</u>เท่านั้น</li><br>
                <li>สามารถจองได้<u style="color: red">ไม่เกิน 1 ชั่วโมง</u></li><br>
                <li>สามารถจองได้ตั้งแต่เวลา 15.00 น. ถึง 20.00 น.</li>
            </div>
        </div>
    </div>
    <div class="col-md-6">
    <?
        if(isset($_REQUEST['status'])) {
    ?>
            <div class="row">
            <?
                if($_REQUEST['status'] == 0) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-success alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Booking completed!
                        </div>
                    </div>
            <?
                } else if($_REQUEST['status'] == 1) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>ERROR!</strong> Please fill in every fields!
                        </div>
                    </div>
            <?
                } else if($_REQUEST['status'] == 2) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>ERROR!</strong> Cannot book more than an hour!
                        </div>
                    </div>
            <?
                } else if($_REQUEST['status'] == 3) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>ERROR!</strong> Cannot book more than once per day!
                        </div>
                    </div>
            <?
                } else if ($_REQUEST['status'] == 4) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>SORRY!</strong> This period was booked!
                        </div>
                    </div>
            <?
                }
            ?>
            </div>
    <?
        }
    ?>
        <div class="panel panel-success rule">
            <div class="panel-heading"><font size="5">จองห้องสควอช</font></div>
            <div class="panel-body">
                <form class="form-horizontal" action="reserve.php" method="POST">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><font size="3">ห้องที่</font></label>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2 radio">
                            <label>
                                <input type="radio" name="room" value="1">1
                            </label>
                        </div>
                        <div class="col-sm-2 radio">
                            <label>
                                <input type="radio" name="room" value="2">2
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><font size="3">เวลาเริ่ม</font></label>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" name="str" min="15:00" max="20:00">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><font size="3">เวลาสิ้นสุด</font></label>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" name="end" min="15:00" max="20:00">
                        </div>
                    </div><br>
                    <div class="text-right">
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <footer>
        <center class="dev">Developed by <a href="https://www.facebook.com/natchapolsrisang" target="_blank">UtopiaBeam</a>.</center>
    </footer>
</body>
</html>