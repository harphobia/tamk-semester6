<?php
require_once '../koneksi.php';
if(!isset($_POST['id']) && !isset($_POST['hadir'])){
    header("Location: /tamk/dosen/absensi.php?code=".$_GET['code']."&pertemuan=".$_GET['pertemuan']);
}

$query="UPDATE `kehadiran` SET `hadir` = '".$_POST['hadir']."' WHERE `kehadiran`.`id` ='".$_POST['id']."';";
$res = $conn->query($query);

if($res>0){
    header("Location: /tamk/dosen/absensi.php?code=".$_GET['code']."&pertemuan=".$_GET['pertemuan']);
}

?>