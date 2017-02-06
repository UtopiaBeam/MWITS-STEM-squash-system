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
                <a href="" class="navbar-brand">Squash</a>
            </div>
            <div class="col-sm-1"></div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="booking.php">Booking</a></li>
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
<?
    connect();
?>
    <div class="col-md-6">
        <div class="panel panel-primary rule">
            <div class="panel-heading"><font size="5">ประกาศล่าสุด</font></div>
            <div class="panel-body announce">
            <?
                $res = "SELECT * FROM `announce`";
                $con = mysql_query($res);
                $row = mysql_fetch_row($con);

                if(mysql_num_rows($con) == 0) {
            ?>
                    <div style="font-style: italic; color: gray;">ไม่มีประกาศในสัปดาห์นี้</div>
            <?
                } else {
                    $con = mysql_query($res);
                    while($row = mysql_fetch_row($con)) {
                        if($row[1] - time() <= strtotime("1 week")) {
            ?>
                            <div class="well">
                            <?
                                echo "(" .date('d/m/Y', $row[1]). ") " .$row[0];
                            ?>
                            </div>
            <?
                        }
                    }
                }
            ?>
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
                            Cancellation completed!
                        </div>
                    </div>
            <?
                }
            ?>
            </div>
    <?
        }
    ?>
        <div class="panel panel-danger rule">
            <div class="panel-heading"><font size="5">แจ้งเตือน</font></div>
            <div class="panel-body">
            <?        
                $usr = $_SESSION['user'];
                $res = "SELECT * FROM `booking` WHERE `user` = '$usr'";
                $con = mysql_query($res);

                if(mysql_num_rows($con) == 0) {
            ?>
                    <div style="font-style: italic; color: gray;">ไม่มีการแจ้งเตือน</div>
            <?
                } else {
                    while($row = mysql_fetch_row($con)) {
            ?>
                        <font size="4">
                    <? echo "การจองของคุณครั้งต่อไป<br>ห้องที่ " .$row[1]. " วันที่ " .date("d F Y", $row[2]). " เวลา " .date("H:i", $row[2]). " - " .date("H:i", $row[3]). " น.";
                    ?>
                        </font>
                        <div></div><br>
                        <div class="text-right">
                            <a href="cancel.php" type="button" class="btn btn-danger">Cancel</a>
                        </div>
            <?
                    }
                }
            ?>
            </div>
        </div>
    </div>
    
    <footer>
        <center class="dev">Developed by <a href="https://www.facebook.com/natchapolsrisang" target="_blank">UtopiaBeam</a>.</center>
    </footer>
</body>
</html>