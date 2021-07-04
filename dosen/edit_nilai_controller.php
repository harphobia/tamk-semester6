<?php


require_once '../koneksi.php';
if(!isset($_POST['id']) && !isset($_POST['nilai'])){
    header('Location: /tamk/dosen/dashboard_2.php');
}

$query="UPDATE `nilai` SET `nilai` = '".$_POST['nilai']."' WHERE `nilai`.`id` = '".$_POST['id']."';";
$result = mysqli_query($conn, $query);

if($result>0){
    header('Location: /tamk/dosen/nilai.php?code='.$_GET['code'].'&pertemuan='.$_GET['pertemuan']);
}


?>