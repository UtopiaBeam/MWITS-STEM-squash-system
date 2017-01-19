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
    <footer>
        <center class="dev">Developed by <a href="https://www.facebook.com/natchapolsrisang" target="_blank">UtopiaBeam</a>.</center>
    </footer>
</body>
</html>