<?php
HOST="";
USERNAME="";
PASSWORD="";
$link = mysql_connect('HOST', 'USERNAME', 'PASSWORD');
//if connection is not successful you will see text error
if (!$link) {
       die('Could not connect: ' . mysql_error());
}
//if connection is successfuly you will see message bellow
echo 'Connected successfully';

$dbnum=SELECT count (*) FROM (SELECT DISTINCT TABLE_SCHEMA FROM information_schema.SCHEMA_PRIVILEGES WHERE GRANTEE LIKE ("'username'%") GROUP BY TABLE_SCHEMA) AS baseview;
mysql_close($link);
echo $dbnum;
?>
