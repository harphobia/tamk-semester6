<?php

    require_once '../koneksi.php';
    if(!isset($_POST['code']) && !isset($_POST['hari'])){
        header('Location: /tamk/dosen/dashboard.php');
    }

    $query="UPDATE `enroll_code` SET `jadwal` = '".$_POST['hari']."' WHERE `enroll_code`.`code` = '".$_POST['code']."';";
    $result = mysqli_query($conn, $query);

    if($result>0){
        header('Location: /tamk/dosen/dashboard.php');
    }

?>