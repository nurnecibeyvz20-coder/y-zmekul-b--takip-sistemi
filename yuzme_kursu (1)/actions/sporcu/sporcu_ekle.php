<?php

session_start();

include "../../config/db.php";

$ad      = $_POST['ad'];
$soyad   = $_POST['soyad'];
$tarih   = $_POST['tarih'];
$telefon = $_POST['telefon'];
$takim   = $_POST['takim'];

$sql = "INSERT INTO sporcular
(ad, soyad, dogum_tarihi, telefon, takim_id, kayit_tarihi)
VALUES(?, ?, ?, ?, ?, CURDATE())";

$stmt = $pdo->prepare($sql);

if($stmt->execute([
    $ad,
    $soyad,
    $tarih,
    $telefon,
    $takim
])){

    $_SESSION['sporcuKayitSuccess'] = "Sporcu başarıyla eklendi.";

} else {

    $_SESSION['sporcuKayitEerror'] = "Sporcu eklenemedi.";

}

header("Location: ../../index.php");
exit;