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

$query='SELECT count (*) FROM information_schema.SCHEMATA';
$dbnum=mysql_query($query);
if(!$dbnum){
    die('Invalid query:'.mysql_error());
}



mysql_close($link);
echo $dbnum;
?>
