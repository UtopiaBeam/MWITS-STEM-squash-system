<?
    include('script/def.php');

    $msg = $_REQUEST['msg'];
    $time = time();
    
    if($msg == '') {
        header('Location: announce.php?announced=0');
    }
    else {
        connect();

        $res = "INSERT INTO `announce`(`msg`, `date`) VALUES ('$msg', '$time')";
        mysql_query($res);
        
        mysql_close();
        header('Location: announce.php?announced=1');
    }
?>