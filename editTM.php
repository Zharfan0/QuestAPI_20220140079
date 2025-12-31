<?php
include_once "koneks.php";
 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
$inputData = json_decode(file_get_contents('php://input'), true);
 
if ($inputData !== null) {
       $nama   = isset($inputData['nama'])   ? $inputData['nama'] : '';
        $alamat = isset($inputData['alamat']) ? $inputData['alamat'] : '';
$telpon = isset($inputData['telpon']) ? $inputData['telpon'] : '';
 

$query = mysqli_query($conn,"UPDATE teman SET nama = '".$nama."' ,alamat = '".$alamat."' ,telpon = '".$telpon."' WHERE id = '".$id."'");
 
if(mysqli_affected_rows($conn) > 0){
header('Content-Type: application/json');
        echo json_encode(['message' => 'Data berhasil di-update']);
    } else {
       header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Data tidak ditemukan']);
}
 
        // Close the statement
        $query->close();
}else {
        // Jika decoding JSON gagal, return 400 Bad Request error
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Invalid JSON data']);
    }

}else {
    // Jika ID nya invalid, return 400 Bad Request error
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid ID']);
}
?>