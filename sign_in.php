<?
    include('.script/def.php');

    $login_user = $_REQUEST['login_user'];
    $login_pass = $_REQUEST['login_pass'];

    if($login_user == '' || $login_pass == '') {
        header('Location: index.php?status=0');
    }
    else {
        connect();
        
        $res = "SELECT * FROM `account` WHERE `user`='$login_user' and `pass`='$login_pass' ";
        $con = mysql_query($res);
        mysql_fetch_row($con);
        
        if(mysql_num_rows($con) == 1) {
            session_start();
            $_SESSION['user'] = $login_user;
            header('Location: profile.php');
        }
        else {
            header('Location: index.php?status=-1');
        }
        mysql_close();
    }
?>