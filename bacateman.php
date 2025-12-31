(untuk membaca semua data yang berada pada tabel teman)
 
<?php
include_once "koneks.php";
 
$result = mysqli_query($conn,"SELECT * FROM teman order by nama");
$json = array();

while($row = mysqli_fetch_assoc($result)){
$json[] = $row;
}
echo json_encode($json);
mysqli_close($conn);
?>