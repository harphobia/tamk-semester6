<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" />
    <link rel="stylesheet" href="../assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/styles/styles.css" />
</head>
<body>
    <?php
    require_once '../koneksi.php';
    session_start();
    require_once 'navbar.php'
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

    <div id="content" style="margin-top: 10px; ">
        
    </div>

    <div class="row mt-2">
    <div class="col-md-12" id="cart">
    <div class="card">
    <div class="card-body">

    <?php 
        if(isset($_GET['enroll_status'])){
            if($_GET['enroll_status'] == 0){
                echo "<div class='alert alert-success col-md-12 mt-3 text-center'>Enroll code sukses terEnroll</div>";
            }elseif($_GET['enroll_status'] == 1){
                echo "<div class='alert alert-danger col-md-12 mt-3 text-center'>Enroll code sudah terEnroll</div>";
            }else {
                echo "<div class='alert alert-danger col-md-12 mt-3 text-center'>Enroll code tidak terdaftar</div>";
            }
        }
    ?>
    
    <div class="input-group mb-3">
            <form action="enroll.php" method="post" class="form-inline">
                <div class="form-group">
                    <input type="hidden" name="nim" value="<?=$_SESSION['nim']?>">
                    <input type="text" class="form-control" placeholder="Enroll Code" aria-label="Recipient's username" aria-describedby="basic-addon2" name="enroll_code" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">ENROLL</button>
                    </div>
                </div>
            </form>
    </div>

    <div class="container card p-4">
            <div class="row">
                <?php
                    $query = "SELECT enrolled_code.id,enroll_code.jadwal, enroll_code.nama_kelas, dosen.nama FROM ((enrolled_code INNER JOIN enroll_code ON enrolled_code.enroll_code = enroll_code.code)INNER JOIN dosen ON enroll_code.nik_dosen = dosen.nik) WHERE NIM_mahasiswa = '".$_SESSION['nim']."';";
                    $data = $conn->query($query);
                    while ($row = $data->fetch_assoc()) {
                ?>
                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?=$row['nama_kelas']?></h5>
                            <p class="card-text">Dosen : <?=$row['nama']?></p>
                            <p class="card-text">Hari : <?=$row['jadwal']?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


</body>
</html>