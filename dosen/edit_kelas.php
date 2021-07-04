<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
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
    if(!isset($_GET['code'])){
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
                        <a class="nav-link active" href="dashboard.php">Jadwal<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_1.php">Absensi</a>
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

    <?php
                $query = "SELECT * FROM `enroll_code` WHERE code='".$_GET['code']."'";
                $data = $conn->query($query);
                $row = $data->fetch_assoc()
    ?>

    <form action="edit_kelas_controller.php?code=<?=$_GET['code']?>" method="post">
        <div class="form-group">
            <label>Enroll Code</label>
            <input type="text" class="form-control" name="code" value="<?=$row['code']?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Matakuluah</label>
            <input type="text" class="form-control" value="<?=$row['nama_kelas']?>" readonly>
        </div>
        <div class="form-group">
            <label>Hari</label>
            <input type="text" class="form-control" name="hari" value="<?=$row['jadwal']?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-warning" href="dashboard.php" role="button">Back</a>
    </form>
    </div>
    </div>
    </div>
    </div>


</body>
</html>