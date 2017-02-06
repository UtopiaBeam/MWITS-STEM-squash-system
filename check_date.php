<?
    include('script/def.php');
    connect();

    $date_res = "SELECT * FROM `time_date`";
    $date_query = mysql_query($date_res);
    $today = date("Y-m-d", time());

    while($date_row = mysql_fetch_row($date_query)) {
        if($today == $date_row[0]) {
            break;
        }
        
        $date_res = "UPDATE `time_date` SET `now_date` = '$today' WHERE 1";
        mysql_query($date_res);
    }

    mysql_close();
?>