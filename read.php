<?php

include "../../../config/koneksi.php";


$query = mysqli_query($kon, "SELECT * FROM `peserta`");

$dataArray = [];

while($row = mysqli_fetch_assoc($query)){
    array_push($dataArray, $row);
}


if($query){
    $status = true;
    $pesan = "data berhasil disimpan";
}else{
    $status = false;
    $pesan = "data gagal disimpan";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $dataArray
];

header("Content-Type: application/json");
echo json_encode($json);

?>