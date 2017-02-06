# MWITS STEM Squash booking system
This is a project for MWITS STEM activity.
**Report bugs [here](https://www.facebook.com/natchapolsrisang)**

##How to connect to database
Edit the database's information in [**script/def.php**](script/def.php) as following:
```
<?
    function connect() {
        $con = mysql_connect(db_host, db_username, db_password);
        mysql_select_db(db_table) or die("Error! " . mysql_error());
        mysql_query("SET NAMES UTF8");
    }
?>
```
