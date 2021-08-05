<!-- Inlude Header -->
<?php include'template/header.php'; ?>

<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#"><i class="fa fa-fw fa-shield-virus"></i> WEB KAWAL COVID-19 <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="provinsi.php"> Provinsi <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="maps.php"> Maps <span class="sr-only">(current)</span></a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                <strong>Update</strong> Data Covid-19 Di Indonesia
            </div>
        </div>

<!-- Request data ke API KAWALCORONA -->
<?php
$url = file_get_contents('https://api.kawalcorona.com/indonesia');
$data = json_decode($url, true);
?>

<!-- Memasukan data kedalam CARD -->
    <div class="col-md-3">
        <div class="card badge-primary p-3 mt-5 shadow rounded">
            <div class="card-body">
                <h4 class="card-title text-center"><i class="fas fa-hospital-user fa-3x"></i> <br>Positif</h4>
                <p class="card-text text-center"><?= $data[0]['positif']; ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card badge-warning p-3 mt-5 shadow rounded">
            <div class="card-body">
                <h4 class="card-title text-center"><i class="fas fa-procedures fa-3x"></i> <br>Dirawat</h4>
                <p class="card-text text-center"><?= $data[0]['dirawat']; ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card badge-success p-3 mt-5 shadow rounded">
            <div class="card-body">
                <h4 class="card-title text-center"><i class="fas fa-grin-beam fa-3x"></i> <br>Sembuh</h4>
                <p class="card-text text-center"><?= $data[0]['sembuh']; ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card badge-danger p-3 mt-5 shadow rounded">
            <div class="card-body">
                <h4 class="card-title text-center"><i class="fas fa-sad-tear fa-3x"></i> Meninggal</h4>
                <p class="card-text text-center"><?= $data[0]['meninggal']; ?></p>
            </div>
        </div>
    </div>

<!-- Inlude Footer -->
<?php include'template/footer.php'; ?>