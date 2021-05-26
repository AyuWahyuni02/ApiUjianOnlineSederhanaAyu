<?php

include "../../../config/koneksi.php";

$nisn = @$_POST["nisn"];

$query = mysqli_query($kon, "DELETE FROM `peserta` WHERE `nisn`='".$nisn."'");


if($query){
    $status = true;
    $pesan = "data berhasil dihapus";
}else{
    $status = false;
    $pesan = "data gagal dihapus";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>

