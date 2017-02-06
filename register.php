<?
    include('script/def.php');

    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    $pchk = $_REQUEST['pchk'];

    if($user == '' || $pass == '' || $pchk == '') {
        header('Location: sign_up.php?status=0');
    }
    else if(strcmp($pass, $pchk) != 0) {
        header('Location: sign_up.php?status=1');
    }
    else {
        connect();

        $res = "INSERT INTO `account`(`user`, `pass`) VALUES ('$user', '$pass')";
        mysql_query($res);
        mysql_close();

        if($con != NULL) {
            header('Location: index.php?status=1');
        }
    }
?>