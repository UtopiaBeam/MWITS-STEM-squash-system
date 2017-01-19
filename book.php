<?
    session_start();
    $room = $_REQUEST['room'];
    $str = strtotime($_REQUEST['str']);
    $end = strtotime($_REQUEST['end']);

    if($room == '' || $str == '' || $end == '') {
        header('Location: booking.php?status=1');
    }
    else if($end - $str > 3600) {
        header('Location: booking.php?status=2');
    }
    else { 
        $con = mysql_connect("localhost", "root", "");
        mysql_select_db("squash") or die("Error! " . mysql_error());
        
        $login_user = $_SESSION['user'];
        
        //Check if the user has already booked or not.
        $res = "SELECT * FROM `booking` WHERE `user` = '$login_user'";
        $con = mysql_query($res);
        if(mysql_num_rows($con) > 0) {
            header('Location: booking.php?status=3');
            break;
        }
        
        //Check if request time idle or not.
        $isIdle = true;
        $res = "SELECT * FROM `booking` WHERE `room` = '$room'";
        $con = mysql_query($res);
        while($row = mysql_fetch_row($con)) {
            if( ($str <= $row[2] && $row[2] < $end) || ($str < $row[3] && $row[3] <= $end) ) {
                $isIdle = false;
                break;
            }
        }
        if($isIdle == false) {
            header('Location: booking.php?status=4');
            break;
        }
        
        //Insert request
        $res = "INSERT INTO `booking`(`user`, `room`, `str`, `end`) VALUES ('$login_user', '$room', '$str', '$end')";
        
        if(!mysql_query($res)) {
            echo "Error! " . mysql_error();
        }
        else {
            mysql_close();
            header('Location: booking.php?status=0');
        }
    }
?>