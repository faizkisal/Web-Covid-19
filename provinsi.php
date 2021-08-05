<!-- Inlude Header -->
<?php include'template/header.php'; ?>

<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="index.php"><i class="fa fa-fw fa-shield-virus"></i> WEB KAWAL COVID-19 <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#"> Provinsi <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="maps.php"> Maps <span class="sr-only">(current)</span></a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                <strong>Update</strong> Data Covid-19
            </div>
        </div>

<!-- Request data ke API KAWALCORONA -->
<?php
$url = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi/');
$data = json_decode($url, true);
?>

<!-- Card -->
<div class="col-md-12">
<div class="card border-primary mb-3">
  <div class="card-header bg-primary text-white">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</div>
  <div class="card-body text-primary">

<!-- Memasukan data kedalam tabel -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">PROVINSI</th>
      <th scope="col">POSITIF</th>
      <th scope="col">SEMBUH</th>
      <th scope="col">MENINGGAL</th>
    </tr>
  </thead>
  <tbody>

<!-- Memforeach data kedalam tabel -->
    <?php $no=1; foreach ($data as $key => $prov) { ?>
    <tr>
        <td> <?= $no++ ?> </td>
        <td> <?= $prov['attributes']['Provinsi']; ?> </td>
        <td>  <?= $prov['attributes']['Kasus_Posi']; ?> </td>
        <td>  <?= $prov['attributes']['Kasus_Semb']; ?> </td>
        <td>  <?= $prov['attributes']['Kasus_Meni']; ?> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>

</div>
</div>

<!-- Inlude Footer -->
<?php include'template/footer.php'; ?>