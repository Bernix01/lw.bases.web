<?php

include_once('clases/databaseConnection.php');
$conn= new DatabaseConnection();
echo $conn->lastId();
$query="select count(*) from information_schema.SCHEMATA";
$dbnum=mysqli_query($conn,$query);
if($dbnum){
    $data = mysqli_fetch_array($dbnum);
    echo $data[0];
}
else{
    die('Invalid query:'.mysqli_error());

}




mysqli_close($conn);

?>
