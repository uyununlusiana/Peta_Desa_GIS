@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html>
<head>
	<title>DESA TAMAN INDAH</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="asset/leaflet.css">
	<script src="asset/leaflet.js"></script>
	<script src="geojson/tamanindah.js"></script>
	<style>
		html, body {
			height: 100%;
			width: 100%;
			margin:0;
			padding: 0;
		}
		#map {
			width: 100%;
			height:100%;
		}
		.leaflet-popup-content {
			width:auto !important;
		}

	</style>
</head>
<body>
    <div id="map"></div>


    <script>
    //     var mapIcon = L.Icon.extend({
	//     iconSize:     [32, 37]
	// });
    // var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + 
    //              ' &copy; <a href="https://www.jihadul4kbar.github.io/">Jihadul Akbar</a>',
    //     mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamloYWR1bDRrYmFyIiwiYSI6ImNqZ3lzOXpmaDA0bGQzMnJveGh5eW5lZjgifQ.IrFoCdc8VtGPQEzUFPqG_A';

    // var streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr}),
    //     grayscale   =  L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr});
    //     traffic = L.tileLayer(mbUrl, {id:'mapbox.mapbox-terrain-v2', attribution:mbAttr});
    //     jalanv8 = L.tileLayer(mbUrl, {id:'mapbox.mapbox-streets-v8', attribution:mbAttr});
    //     satellite = L.tileLayer(mbUrl, {id:'mapbox.satellite', attribution:mbAttr});
    var mapIcon = L.Icon.extend({
	    iconSize:     [32, 37]
	});
	// var masjidIcon = new mapIcon({iconUrl: 'icon/mosquee.png'}),
	//     sekolahIcon = new mapIcon({iconUrl: 'icon/school.png'});
	//     // kecamatanIcon = new mapIcon({iconUrl: 'icon/gbr2.png',  iconSize: [38, 50]});
	//     // tamanIcon = new mapIcon({iconUrl: 'icon/garden.png'});
	//     pasarIcon = new mapIcon({iconUrl: 'icon/market.png'});
	//     // kesehatanIcon = new mapIcon({iconUrl: 'icon/hospital.png'});
	//     // pemerintahanIcon = new mapIcon({iconUrl: 'icon/congress.png'});
	//     // wadukIcon = new mapIcon({iconUrl: 'icon/river-2.png'});


    // var peta = L.map('batasdesa', {
    //     // center: [-8.6416479, 116.3522657],
    //     center: [-8.6873968, 116.2817962],
    //     zoom: 50,
    //     layers: [ streets]
    // });
// var mapIcon = L.Icon.extend({
//         options: {
//             iconSize:     [30, 35],
//             iconAnchor:   [22, 94],
//             popupAnchor:  [-5, -90] 
//         }
//         });
    var masjidIcon = new mapIcon({iconUrl: 'icon/mosquee.png'}),
        pasarIcon = new mapIcon({iconUrl: 'icon/market.png'}),
        kantorIcon = new mapIcon({iconUrl: 'icon/gbr2.png', iconSize: [38, 50]});
        hospitalIcon = new mapIcon({iconUrl: 'icon/hospital.png'});
        sekolahIcon = new mapIcon({iconUrl: 'icon/school.png'});

   var kntor = L.marker([-8.6185168,116.2653179],{icon:kantorIcon})
    .bindPopup('<img src="asset/images/kantordesa.jpg" width="200px"><br>kantor desa Taman Indah </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
	var kantor= L.layerGroup([kntor]);

    // L.marker([-8.6185221,116.1974688],{icon:hospitalIcon})
    // .bindPopup('Polindes desa Taman Indah');
// -

//Marker Sekolah
    var sklh1 = L.marker([-8.6123631,116.2638547],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/smkbb.jpg" width="200px"> <br> SMK Bangun Bangsa </br> <br> Taman Indah Barat, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');

    var sklh2 = L.marker([-8.6116177,116.2658555],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/SDNbtx.jpg" width="200px"> <br> SDN Banteng Keselet <br> Banteng Keselet, Beber, Kec. Batukliang, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');

	var sklh3 = L.marker([-8.617113,116.2653324],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/SDNbtx.jpg" width="200px"> <br> SDN Banteng Keselet <br> Banteng Keselet, Beber, Kec. Batukliang, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');

	var sklh4 = L.marker([-8.6202772,116.2616026],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/udf.png" width="200px"> <br> Yayasan Pondok Pesantren Abdul Qadir Sidiq </br> <br> Benteng Desa Taman Indah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');

	var sklh5 = L.marker([-8.6222357,116.2673989],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/udf.png" width="200px"> <br> SDN REPOK SINTUNG </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
	
	var sklh6 = L.marker([-8.6265688,116.2648723],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/ypp.jpg" width="200px"> <br> Yayasan Pondok Pesantren Sirajul Huda </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
	
	var sklh7 = L.marker([-8.6287573,116.2689417],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/udf.png" width="200px"> <br> SDN REPOK TUNJANG </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
	
	var sklh8 = L.marker([-8.6294116,116.2696458],{icon:sekolahIcon})
    .bindPopup('<img src="asset/images/rpj.jpg" width="200px"> <br> SMPN 4 PRINGGARATA SATAP REPOK TUNJANG </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
	
	
	
    var sekolah = L.layerGroup([sklh1, sklh2, sklh3, sklh4, sklh5,sklh6, sklh7, sklh8]);

//   L.marker([-8.6903015,116.2458821],{icon:sekolahIcon})
//     .bindPopup('ponpes jihadul ummah lombok tengah');

    var mj1 = L.marker([-8.6178039,116.2645108],{icon: masjidIcon})
    .bindPopup('<img src="asset/images/masjidsss.jpg" width="200px"><br> Masjid Albuniya At Taqwa Salam Sukur </br> <br> salam sukur, taman indah, pringgarataLombok Tengah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');

   var mj2 =  L.marker([-8.6120475,116.2654684],{icon: masjidIcon})
    .bindPopup('<img src="asset/images/masjidbtx.jpg" width="200px"><br> Masjid Nurul Huda Banteng Keselet </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562 </br>');
    
	var mj3 =  L.marker([-8.6199462,116.2642021],{icon: masjidIcon})
    .bindPopup('<img src="asset/images/mkj.jpg" width="200px"><br> MASJID USSISALATAQWA </br> <br>  Karang jangkong, taman indah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562</br>');
    
	var mj3 =  L.marker([-8.6304542,116.2686891],{icon: masjidIcon})
    .bindPopup('<img src="asset/images/mtj.jpg" width="200px"><br> Masjid Misbahul Munir, Tunjang Timuk </br> <br> Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83552</br>');
    
	
	
	var masjid = L.layerGroup([mj1, mj2, mj3]); 

    var toko1 =  L.marker([-8.6186229,116.2650604],{icon: pasarIcon})
    .bindPopup('<img src="asset/images/ud.jpg" width="200px"><br> UD CAHAYA MANDIRI </br> <br> Taman Indah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562</br>');
  
    var toko2 =  L.marker([-8.6177426,116.2665806],{icon: pasarIcon})
    .bindPopup('<img src="asset/images/udm.jpg" width="200px"><br> UD MADINAH </br> <br> Jl. Desa Taman Indah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562</br>');
  
	var toko3 =  L.marker([-8.6121236,116.2655425],{icon: pasarIcon})
    .bindPopup('<img src="asset/images/udf.png" width="200px"><br> UD FATHAN </br> <br>Banteng keselet, Taman Indah, PringgarataLombok Tengah,, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562</br>');
  
	var toko4 =  L.marker([-8.6164531,116.2620832],{icon: pasarIcon})
    .bindPopup('<img src="asset/images/udf.png" width="200px"><br> UD MUSKANDI </br> <br>salam sukur, taman indah, pringgarataLombok Tengah, Pringgarata, Kec. Pringgarata, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83562</br>');
	
	var toko5 =  L.marker([-8.6200244,116.2666966],{icon: pasarIcon})
    .bindPopup('<img src="asset/images/tdm.png" width="200px"><br> TOKO DINA MANDIRI </br> <br> Jalan Raya, Taman indah, Pringgarata, Central Lombok Regency, West Nusa Tenggara 83562</br>');
	
	
	
	var pasar = L.layerGroup([toko1, toko2, toko3,toko4,toko5]); 
    
	//##############################################//
	// Membuat BaseMap Pada Peta
	//##############################################//

	var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	var streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});

	//##############################################//
	// Mendeklarasikan Peta kedalam Id Map
	//##############################################//
	var map = L.map('map', {
		center: [-8.6416479, 116.3522657],
		zoom: 13,
		layers: [streets]
	});

	//##############################################//
	// Mendeklarasikan BaseLayer Pada Map yakni Street
	//##############################################//
	var baseLayers = {
		"Streets": streets,
        // "Grayscale": grayscale,
        // "Trapik": traffic,
        // "Jalanv8": jalanv8,
        // "Satellite": satellite,
        
	};


 	//##############################################//
	// Deklarasi untuk memilih Icon yang akan ditampilkan
	//##############################################//
	var overlays = {
		"Masjid": masjid,
		"Sekolah": sekolah,
		"Toko/UD" : pasar,
		"Kantor" : kantor,
    };

	//##############################################//
	// Menambah  variabel baselayaer dan overlay kedalam map
	//##############################################//
	L.control.layers(baseLayers, overlays).addTo(map);


	L.geoJSON([tamanindah], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		}
	}).addTo(map);

    // var baseLayers = {
    //     "Jalan": streets,
        // "Hitam Putih": grayscale,
        // "Trapik": traffic,
        // "Jalanv8": jalanv8,
        // "Satellite": satellite,
        
    // };
    // var overlays = {
    //     "Masjid": masjid
    // };

    // L.control.layers(baseLayers);

    	//##############################################//
	// Membuat BaseMap Pada Peta
	//##############################################//

	
	//##############################################//
	// Mendeklarasikan Peta kedalam Id Map
	//##############################################//


	//##############################################//
	// Mendeklarasikan BaseLayer Pada Map yakni Street
	//##############################################//
	// var baseLayers = {
	// 	"Streets": streets
	// };


 

   

    //##############################################//
	// Menambah  variabel baselayaer dan overlay kedalam map
	//##############################################//
	// L.control.layers(baseLayers, overlays).addTo(batasdesa);

//##############################################//
// Menbambil data geospesial wilayak kecamatan praya
//##############################################//
// L.geoJSON([btskab], {
//     style: function (feature) {
//         return feature.properties && feature.properties.style;
//     }
// }).addTo(map);

    
    </script>
</body>
</html>