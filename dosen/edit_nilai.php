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
    if(!isset($_GET['id'])){
        header('Location: /tamk/dosen/dashboard.php');
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

    <?php
                $q = "SELECT nilai.nilai,nilai.id_enrolled FROM `nilai` WHERE id='".$_GET['id']."';";
                $d = $conn->query($q);
                $r = $d->fetch_assoc();
            
                $query = "SELECT mahasiswa.nama FROM `mahasiswa` INNER JOIN enrolled_code ON enrolled_code.NIM_mahasiswa=mahasiswa.nim WHERE enrolled_code.id='".$r['id_enrolled']."'";
                $data = $conn->query($query);
                $row = $data->fetch_assoc();
    ?>

    <form action="edit_nilai_controller.php?code=<?=$_GET['code']?>&pertemuan=<?=$_GET['pertemuan']?>" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" class="form-control" value="<?=$row['nama']?>" readonly>
        </div>
        <div class="form-group">
            <label>Pertemuan Ke</label>
            <input type="text" class="form-control" value="<?=$_GET['pertemuan']?>" readonly>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" value="<?=$r['nilai']?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-warning" href="nilai.php?&code=<?=$_GET['code']?>&pertemuan=<?=$_GET['pertemuan']?>" role="button">Back</a>
    </form>
    </div>
    </div>
    </div>
    </div>


</body>
</html>