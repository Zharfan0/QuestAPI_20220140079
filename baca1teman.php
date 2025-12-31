<?php
include_once "koneks.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
 
if ($id > 0) {
$result = mysqli_query($conn,"SELECT * FROM teman WHERE id = '".$id."'");
 
    if ($result->num_rows > 0) {
$siswa = mysqli_fetch_assoc($result);
header('Content-Type: application/json');
echo json_encode($siswa);
    } else {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Data tidak ditemukan']);
        }
}
else
{
  header('HTTP/1.1 400 Bad Request');
         echo json_encode(['error' => 'Invalid ID']);
}
 
mysqli_close($conn);
?>