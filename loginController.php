<?php
        require_once 'koneksi.php';
        session_start();

        if($_POST['username'] && $_POST['password']){
            
            $query="SELECT nim,nama,password FROM `mahasiswa` WHERE nim='".$_POST['username']."';";
            $result = mysqli_query($conn, $query);
            if ( mysqli_num_rows($result)>0) {
                $data=mysqli_fetch_assoc($result);
                if($data['nim'] == $_POST['username'] && $data['password'] == $_POST['password']){
                    $_SESSION['nim'] = $data['nim'];
                    $_SESSION['nama'] = $data['nama'];
                    header('Location: /tamk/mahasiswa/dashboard.php');
                }else{
                    header('Location: /tamk/login.php?fail');
                }
            }else{
                $query="SELECT nik,nama,password FROM `dosen` WHERE nik='".$_POST['username']."';";
                $result = mysqli_query($conn, $query);
                if ( mysqli_num_rows($result)>0) {
                    $data=mysqli_fetch_assoc($result);
                    if($data['nik'] == $_POST['username'] && $data['password'] == $_POST['password']){
                        $_SESSION['nik'] = $data['nik'];
                        $_SESSION['nama'] = $data['nama'];
                        header('Location: /tamk/dosen/dashboard.php');
                    }else{
                        header('Location: /tamk/login.php?fail');
                    }
                }else{
                    header('Location: /tamk/login.php?fail');
                }
            }

        }else{
            header('Location: /tamk/login.php');
        }

?>