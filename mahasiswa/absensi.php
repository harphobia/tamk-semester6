<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" />
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/styles/styles.css" />
</head>
<body>
    <?php

    if(!isset($_GET['nim']) && !isset($_GET['code'])){
        header('Location: /tamk/mahasiswa/dashboard_1.php');
    }


    require_once '../koneksi.php';
    session_start();
    require_once 'navbar.php'
    ?>

    <?php
    $query = "SELECT * FROM `enroll_code` WHERE code='".$_GET['code']."';";
    $data = $conn->query($query);
    $dat=$data->fetch_assoc()
    ?>

    <div id="content">
    <div class="container">
    <div class="card mt-3">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
            <div class="padding-nav">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard_1.php">Absensi<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_2.php">Nilai</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </nav>
    </div>

    <div id="content" style="margin-top: 10px; ">
        
    </div>

    <div class="row mt-2">
    <div class="col-md-12" id="cart">
    <div class="card">
    <div class="card-body">
    <div class="container card p-4">
    
    <p>Mata Kuliah : <?=$dat['nama_kelas']?></p>

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Pertemuan Ke</th>
        <th scope="col">Status Absensi</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $query = "SELECT kehadiran.id, kehadiran.tanggal,enroll_code.nama_kelas, kehadiran.pertemuan_ke, kehadiran.hadir FROM ((kehadiran INNER JOIN enrolled_code ON kehadiran.id_enrolled = enrolled_code.id)INNER JOIN enroll_code ON enrolled_code.enroll_code = enroll_code.code) WHERE enrolled_code.NIM_mahasiswa='".$_GET['nim']."' AND enrolled_code.enroll_code = '".$_GET['code']."';";
            $data = $conn->query($query);
            while ($row = $data->fetch_assoc()) {
        ?>
                <tr>
                    <th><?=$row['tanggal']?></th>
                    <td><?=$row['pertemuan_ke']?></td>
                    <td>
                        <?php if($row['hadir']==1){ ?>
                            HADIR
                        <?php }else{ ?>
                            Tidak Hadir
                        <?php } ?>
                    </td>
                </tr>
        <?php
            }
        ?>
    
    </tbody>
    </table>
    <a class="btn btn-primary" href="dashboard_1.php" role="button">Back</a>

        </div>
    </div>
    </div>
    </div>
    </div>


</body>
</html>