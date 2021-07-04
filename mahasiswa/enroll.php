<?php

require_once '../koneksi.php';
if($_POST['enroll_code'] && $_POST['nim']){
    $query="SELECT code FROM `enroll_code` WHERE code='".$_POST['enroll_code']."';";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){

        $query="SELECT id FROM `enrolled_code` WHERE enroll_code='".$_POST['enroll_code']."' AND NIM_mahasiswa='".$_POST['nim']."';";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){
            $query="INSERT INTO `enrolled_code` (`id`, `NIM_mahasiswa`, `enroll_code`, `enroll_at`) VALUES (NULL, '".$_POST['nim']."', '".$_POST['enroll_code']."', current_timestamp());";
            $result = mysqli_query($conn, $query);

            echo($result);
            if($result>0){
                header('Location: /tamk/mahasiswa/dashboard.php?enroll_status=0');
            }
        }else {
            header('Location: /tamk/mahasiswa/dashboard.php?enroll_status=1');
        }

    }else {
        header('Location: /tamk/mahasiswa/dashboard.php?enroll_status=2');
    }
}else {
    header('Location: /tamk/mahasiswa/dashboard.php');
}
?>