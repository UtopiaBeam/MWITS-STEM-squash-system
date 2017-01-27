<?
    function connect() {
        $con = mysql_connect("localhost", "root", "");
        mysql_select_db("squash") or die("Error! " . mysql_error());
        mysql_query("SET NAMES UTF8");
    }
?>