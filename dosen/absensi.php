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
    require_once '../koneksi.php';
    session_start();
    require_once 'navbar.php';
    if(!isset($_SESSION['nik'])){
        header('Location: /tamk/login.php');
    }
    if(!isset($_GET['code']) && !isset($_GET['pertemuan'])){
        header('Location: /tamk/dosen/dashboard_1.php');
    }
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
                        <a class="nav-link" href="dashboard.php">Jadwal<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard_1.php">Absensi</a>
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


    <div class="row mt-2">
    <div class="col-md-12" id="cart">
    <div class="card">
    <div class="card-body">
    <div class="container card p-4">
    <table class="table table-striped">
    <a class="btn btn-primary col-md-1" href="tambah_absensi.php?code=<?=$_GET['code']?>&pertemuan=<?=$_GET['pertemuan']?>" role="button">Isi Absensi</a>
        <thead>
            <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $query = "SELECT kehadiran.id, kehadiran.tanggal,mahasiswa.nim,mahasiswa.nama, kehadiran.pertemuan_ke, kehadiran.hadir FROM ((kehadiran INNER JOIN enrolled_code ON kehadiran.id_enrolled = enrolled_code.id)INNER JOIN mahasiswa ON enrolled_code.NIM_mahasiswa = mahasiswa.nim) WHERE enrolled_code.enroll_code='".$_GET['code']."' AND kehadiran.pertemuan_ke='".$_GET['pertemuan']."';";
                $data = $conn->query($query);
                while ($row = $data->fetch_assoc()) {
            ?>
                    <tr>
                        <th><?=$row['nim']?></th>
                        <td><?=$row['nama']?></td>
                        <td>
                            <?= $row['hadir'] == 1?"Hadir":"Tidak hadir"?>
                        </td>
                        <td>
                        <a class="btn btn-primary" href="edit_absen.php?id=<?=$row['id']?>&code=<?=$_GET['code']?>&pertemuan=<?=$_GET['pertemuan']?>" role="button">Edit</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        
        </tbody>
        </table>
        <a class="btn btn-primary" href="pertemuan_absen.php?code=<?=$_GET['code']?>" role="button">Back</a>

    </div>
    </div>
    </div>
    </div>


</body>
</html>