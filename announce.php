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
                    <li><a href="booking.php">Booking</a></li>
                    <li class="active"><a href="">Annoucement</a></li>
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
<?
        if(isset($_REQUEST['announced'])) {
    ?>
            <div class="row">
            <?
                if($_REQUEST['announced'] == 1) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-success alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            The announcement has been announced!
                        </div>
                    </div>
            <?
                } else if ($_REQUEST['announced'] == 0) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-danger alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>ERROR!</strong> There is no characters in the message!
                        </div>
                    </div>
            <?
                }
            ?>
            </div>
    <?
        }
    ?>
        <div class="panel panel-primary rule">
            <div class="panel-heading"><font size="5">เพิ่มประกาศ</font></div>
            <div class="panel-body">
                <form action="message.php" method="POST">
                    <div class="form-group">
                        <textarea type="text" class="form-control" rows="5" placeholder="เนื้อหาประกาศ" name="msg"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">    
<?
        if(isset($_REQUEST['deleted'])) {
    ?>
            <div class="row">
            <?
                if($_REQUEST['deleted'] == 1) {
            ?>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="alert alert-success alert-dismissable alert-box" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            The announcement has been deleted!
                        </div>
                    </div>
            <?
                }
            ?>
            </div>
    <?
        }
    ?>
        <div class="panel panel-info rule">
            <div class="panel-heading"><font size="5">ประกาศทั้งหมด</font></div>
            <div class="panel-body announce">
                <?
                    connect();

                    $res = "SELECT * FROM `announce`";
                    $con = mysql_query($res);
                    $row = mysql_fetch_row($con);

                    if(mysql_num_rows($con) == 0) {
                ?>
                        <div style="font-style: italic; color: gray;">ไม่มีประกาศ</div>
                <?
                    } else {
                        $con = mysql_query($res);
                        while($row = mysql_fetch_row($con)) {
                ?>
                            <form action="delete.php" method="POST">
                                <div class="well">
                                <?
                                    echo "(" .date('d/m/Y', $row[1]). ") " .$row[0];
                                ?>
                                    <div></div><br>
                                    <div class="text-right">
                                    <?
                                        echo '<button type="submit" class="btn btn-danger" name="msg_date" value="'.$row[1].'">';
                                    ?>
                                        Delete</button>
                                    </div>
                                </div>
                            </form>
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