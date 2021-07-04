<?php
    
    require_once '../koneksi.php';

    if(!isset($_GET['code']) && !isset($_GET['pertemuan'])){
        header('Location: /tamk/dosen/dashboard.php');
    }
    if(!isset($_GET['id']) && !isset($_GET['status'])){
        header("Location: /tamk/dosen/absensi.php?code=".$_GET['code']."&pertemuan=".$_GET['pertemuan']);
    }

    $query="SELECT kehadiran.id FROM `kehadiran` WHERE kehadiran.id_enrolled='".$_GET['id']."' AND kehadiran.pertemuan_ke='".$_GET['pertemuan']."';";
    $result = mysqli_query($conn, $query);

    if(!mysqli_num_rows($result)>0){
        $q="INSERT INTO `kehadiran` (`id`, `tanggal`, `id_enrolled`, `hadir`, `pertemuan_ke`, `update_at`) VALUES (NULL, current_timestamp(), '".$_GET['id']."', '".$_GET['status']."', '".$_GET['pertemuan']."', current_timestamp());";
        mysqli_query($conn, $q);
    }else{
        $row=$result->fetch_assoc();
        $q="UPDATE `kehadiran` SET `hadir` = '".$_GET['status']."' WHERE `kehadiran`.`id` = '".$row['id']."';";
        mysqli_query($conn, $q);
    }

    header("Location: /tamk/dosen/absensi.php?code=".$_GET['code']."&pertemuan=".$_GET['pertemuan']);

?>