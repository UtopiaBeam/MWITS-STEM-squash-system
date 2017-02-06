<?
    include('script/def.php');

    session_start();
    $del_usr = $_SESSION['user'];

    connect();

    $res = "DELETE FROM `booking` WHERE `user` = '$del_usr'";
    mysql_query($res);

    mysql_close();
    header('Location: profile.php?status=0');
?>