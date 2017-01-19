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
    
    <div class="col-md-6">
        <div class="panel panel-primary rule">
            <div class="panel-heading"><font size="5">ประกาศล่าสุด</font></div>
            <div class="panel-body">
            <?
                $con = mysql_connect("localhost", "root", "");
                mysql_select_db("squash") or die("Error! " . mysql_error());
                mysql_query("SET NAMES UTF8");

                $res = "SELECT * FROM `announce` WHERE 1";
                $con = mysql_query($res);
                $row = mysql_fetch_row($con);

                if(mysql_num_rows($con) == 0) {
            ?>
                    <div style="font-style: italic; color: gray;">ไม่มีประกาศ</div>
            <?
                } else {
                    echo $row[0];
                }
                mysql_close();
            ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-danger rule">
            <div class="panel-heading"><font size="5">แจ้งเตือน</font></div>
            <div class="panel-body">
            <?
                $con = mysql_connect("localhost", "root", "");
                mysql_select_db("squash") or die("Error! " . mysql_error());
                mysql_query("SET NAMES UTF8");

                $res = "SELECT * FROM `announce` WHERE 1";
                $con = mysql_query($res);
                $row = mysql_fetch_row($con);

                if(mysql_num_rows($con) == 0) {
            ?>
                    <div style="font-style: italic; color: gray;">ไม่มีการแจ้งเตือน</div>
            <?
                } else {
                    echo $row[0];
                }
                mysql_close();
            ?>
            </div>
        </div>
    </div>
    
    <footer>
        <center class="dev">Developed by <a href="https://www.facebook.com/natchapolsrisang" target="_blank">UtopiaBeam</a>.</center>
    </footer>
</body>
</html>