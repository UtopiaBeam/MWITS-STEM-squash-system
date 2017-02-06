<?
    include('script/def.php');

    $msg_date = $_REQUEST['msg_date'];

    connect();

    $res = "DELETE FROM `announce` WHERE `date` = '$msg_date'";
    mysql_query($res);

    mysql_close();
    header('Location: announce.php?deleted=1');
?>