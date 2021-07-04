<?php

require_once '../koneksi.php';
if(!isset($_POST['id']) && !isset($_POST['pertemuan']) && !isset($_POST['nilai'])){
    header('Location: /tamk/dosen/dashboard_2.php');
}

$query="SELECT nilai.id FROM `nilai` WHERE nilai.id_enrolled='".$_POST['id']."' AND nilai.pertemuan_ke='".$_POST['pertemuan']."';";
$result = mysqli_query($conn, $query);

if(!mysqli_num_rows($result)>0){
    $q="INSERT INTO `nilai` (`id`, `id_enrolled`, `nilai`, `pertemuan_ke`, `input_at`) VALUES (NULL, '".$_POST['id']."', '".$_POST['nilai']."', '".$_POST['pertemuan']."', current_timestamp());";
    $conn->query($q);
}else{
    $row=$result->fetch_assoc();
    $q="UPDATE `nilai` SET `nilai` = '".$_POST['nilai']."' WHERE `nilai`.`id` = '".$row['id']."';";
    $conn->query($q);
}

header("Location: /tamk/dosen/nilai.php?code=".$_GET['code']."&pertemuan=".$_GET['pertemuan']);
// $row = $result->fetch_assoc();
// echo($row['id'])

// if($result>0){
// }


?>