<?php

include "../../../config/koneksi.php";

$nisn = @$_POST["nisn"];
$nama_depan = @$_POST["nama_depan"];
$nama_belakang = @$_POST["nama_belakang"];
$tempat = @$_POST["tempat"];
$tgl_lahir = @$_POST["tgl_lahir"];
$email = @$_POST["email"];
$token = @$_POST["token"];
$password = md5(@$_POST["password"]);

$query = mysqli_query($kon, "INSERT INTO `peserta`(`nisn`, `nama_depan`, `nama_belakang`, `tempat`, 
`tgl_lahir`, `email`,`token`, `password`) VALUES ('".$nisn."', '".$nama_depan."', '".$nama_belakang."', 
'". $tempat ."', '". $tgl_lahir ."', '".$email."', '".$token."', '".$password."' )");


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
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>