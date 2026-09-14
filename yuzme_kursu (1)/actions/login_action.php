<?php

session_start();

include "../config/db.php";

$kullanici_adi = $_POST['kullanici_adi'];
$sifre         = $_POST['sifre'];

// Aşağıdaki alan rol yapısı olmayacaksa kullanılır.
// $sql = "SELECT * FROM admin WHERE kullanici_adi = ?";

// Rol kullanılacaksa aşağıdaki yapı kullanılır.
$sql = " SELECT admin.*, roller.rol_adi FROM admin INNER JOIN roller ON admin.rol_id = roller.id WHERE admin.kullanici_adi = ? ";

$stmt = $pdo->prepare($sql);

$stmt->execute([$kullanici_adi]);

$admin = $stmt->fetch();

if($admin){

    if($sifre == $admin['sifre']){

        $_SESSION['admin'] = $admin['kullanici_adi'];
        $_SESSION['rol']   = $admin['rol_adi'];

        header("Location: ../index.php");
        exit;

    } else {

        $_SESSION['loginError'] = "Şifre yanlış.";

        header("Location: ../login.php");
        exit;

    }

} else {

    $_SESSION['loginError'] = "Kullanıcı bulunamadı.";

    header("Location: ../login.php");
    exit;

}