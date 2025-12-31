(untuk menambahkan data teman)
 
<?php
include_once "koneks.php";
 
header('Access-Control-Allow-Origin: *');
 
$json = file_get_contents('php://input');
$data  = json_decode($json,true);
 
$nama   = $data['nama'];
$alamat = $data['alamat'];
$telpon = $data['telpon'];
 
class emp{}
 
if (empty($nama)||empty($alamat)||empty($telpon)) 
{
header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Data tidak boleh kosong']);
die(json_encode($response));
}else{
$query = mysqli_query($conn,"INSERT INTO teman (nama,alamat,telpon) values ('$nama','$alamat','$telpon')");

if(mysqli_affected_rows($conn) > 0){
header('Content-Type: application/json');
        echo json_encode(['message' => 'Data berhasil ditambahkan']);
    } else {
       
       header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Data tidak ditemukan']);
}
}
?>