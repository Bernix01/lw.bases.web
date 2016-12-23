<?php
$conn = mysqli_connect("localhost","root","root");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else 
    { echo "Connection successful <br>";
}
$query="select count(*) from information_schema.SCHEMATA";
$dbnum=mysqli_query($conn,$query);
if($dbnum){
    $data = mysqli_fetch_array($dbnum);
    echo $data[0];
    mysqli_select_db("lw");
    return $conn;
}

}   
else{
    die('Invalid query:'.mysqli_error());
}



mysqli_close($conn);

?>
