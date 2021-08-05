<!-- Inlude Header -->
<?php include'template/header.php'; ?>

<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="index.php"><i class="fa fa-fw fa-shield-virus"></i> WEB KAWAL COVID-19 <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="provinsi.php"> Provinsi <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#"> Maps <span class="sr-only">(current)</span></a>
        </div>
    </nav>

<!-- Request data ke API BNPN INACOVID -->
<?php
$url = file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json');
$data = json_decode($url, true);
?>

<!-- Memasukan data kedalam maps leafletjs -->
    <div id="mapid" style="height: 600px;"></div>
    
    <script>
	var mymap = L.map('mapid').setView([-1.7906680412995262, 116.02436103298113], 5);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    /* Memasukan data kedalam market leafletjs */
    <?php foreach ($data['features'] as $key => $value) { ?>
        
        L.marker([<?= $value['geometry']['y']; ?>, <?= $value['geometry']['x']; ?> ]).addTo(mymap)
        .bindPopup("<b>Provinsi : <?= $value['attributes']['Provinsi']; ?></b><br>"+
        "Positif : <?= $value['attributes']['Kasus_Posi']; ?><br>"+
        "Sembuh : <?= $value['attributes']['Kasus_Semb']; ?><br>"+
        "Meninggal : <?= $value['attributes']['Kasus_Meni']; ?><br>"
        );
    <?php } ?>

    </script>

</div>
</div>

<!-- Inlude Footer -->
<?php include'template/footer.php'; ?>