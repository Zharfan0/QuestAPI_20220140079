<?php
include_once "koneks.php";
 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
 
if($id > 0) {
$query = mysqli_query($conn,"DELETE FROM teman WHERE id = '".$id."'");

if(mysqli_affected_rows($conn) > 0){
header('Content-Type: application/json');
$response = array('message' => 'Data berhasil dihapus');
        echo json_encode($response);
    } else {
       
       header('HTTP/1.1 404 Not Found');
$response =array('message' => 'Data tidak ditemukan');
        echo json_encode($response);
}
}else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid ID']);
}
?>