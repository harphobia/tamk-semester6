<?php

    require_once '../koneksi.php';
    if(!isset($_GET['id']) && !isset($_GET['code'])){
        header('Location: /tamk/dosen/dashboard.php');
    }

    $q1="DELETE FROM `nilai` WHERE `nilai`.`id_enrolled` = '".$_GET['id']."';";
    mysqli_query($conn, $q1);
    $q2="DELETE FROM `kehadiran` WHERE `kehadiran`.`id_enrolled` = '".$_GET['id']."';";
    mysqli_query($conn, $q2);


    $query="DELETE FROM `enrolled_code` WHERE `enrolled_code`.`id` = '".$_GET['id']."';";
    $result = mysqli_query($conn, $query);

    
    if($result>0){
        header('Location: /tamk/dosen/list_siswa.php?code='.$_GET['code']);
    }

?>