<?php

include "../../../config/koneksi.php";

$nisn = @$_POST["nisn"];
$nama_depan = @$_POST["nama_depan"];
$nama_belakang = @$_POST["nama_belakang"];
$tempat = @$_POST["tempat"];
$tgl_lahir = @$_POST["tgl_lahir"];

$query = mysqli_query($kon, "UPDATE `peserta` SET `nama_depan`='".$nama_depan."',
`nama_belakang`='".$nama_belakang."',`tempat`='". $tempat ."',`tgl_lahir`='". $tgl_lahir ."'
WHERE `nisn`='".$nisn."'");


if($query){
    $status = true;
    $pesan = "data berhasil diedit";
}else{
    $status = false;
    $pesan = "data gagal diedit";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>