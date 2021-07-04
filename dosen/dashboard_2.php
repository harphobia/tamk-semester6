<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
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
                        <a class="nav-link" href="dashboard_1.php">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard_2.php">Nilai</a>
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
        <thead>
            <tr>
            <th scope="col">Code</th>
            <th scope="col">kelas</th>
            <th scope="col">hari</th>
            <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $query = "SELECT * FROM `enroll_code` WHERE nik_dosen='".$_SESSION['nik']."'";
                $data = $conn->query($query);
                while ($row = $data->fetch_assoc()) {
            ?>
                    <tr>
                        <th><?=$row['code']?></th>
                        <td><?=$row['nama_kelas']?></td>
                        <td><?=$row['jadwal']?></td>
                        <td>
                        <a class="btn btn-primary" href="pertemuan_nilai.php?code=<?=$row['code']?>" role="button">Nilai Siswa</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        
        </tbody>
        </table>
        
    </div>
    </div>
    </div>
    </div>


</body>
</html>