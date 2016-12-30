<?php
include_once('php/colector.php');
include_once('php/databaseConnection.php');
$conn= new DatabaseConnection();
$colector= new Colector();
$resultado=$colector->list("usuario");
echo "<table style =width:100% >
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Last_login</th>
    <th>Rol</th>
  </tr>";
while($row = mysqli_fetch_assoc($resultado)) {

echo "<tr>
<td>". $row["id_usuario"]."</td>";
echo "
  <td>". $row["nickname"]."</td>";
  echo "
    <td>". $row["email"]."</td>";
    echo "
      <td>". $row["last_login"]."</td>";
      echo "
        <td style='text-align: center;'>". $row["rol"]."</td>
</tr>";
}
echo "</table>";
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
