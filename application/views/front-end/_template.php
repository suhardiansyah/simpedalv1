<!DOCTYPE html>
<html lang="en">

<head>
  <title>SIMPEDAL</title>
  <link href="<?php echo base_url() . 'assets/dist/img/favorit.png' ?>" rel="shortcut icon" type="image/ico" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>bootstrap/css/bootstrap.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Archivo+Narrow|Play|Ubuntu+Condensed|Droid+Sans" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/costum.css">

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/markerclusterer_packed.js"></script>

  <script type="text/javascript">
    // var layers = [];
    // //disini layer kml nya
    // layers[0] = new google.maps.KmlLayer('https://perizinan.langkatkab.go.id/kml/bataskecamatanfix_project.kml', {
    //   preserveViewport: true
    // });

    var src = 'https://perizinan.langkatkab.go.id/kml/bataskecamatanfix_project.kml';
    var peta;
    var gambar_kantor = new Array();
    var nama = new Array();
    var kategori = new Array();
    var alamat = new Array();
    var telpon = new Array();
    var jlh_desa = new Array();
    var jlh_kelurahan = new Array();
    var id = new Array();
    var x = new Array();
    var y = new Array();
    var i;
    var url;
    var gambar_tanda;
    var gambar_kantor;
    var baseurl = "<?php echo base_url() ?>";

    function peta_awal() {
      var langkat = new google.maps.LatLng(3.7511738168217867, 98.45200485259126);

      // ini buat ngilangin icon place bawaan google maps
      var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [{
          visibility: "off"
        }]
      }];

      var petaOption = {
        zoom: 2,
        center: langkat,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles
      };

      peta = new google.maps.Map(document.getElementById('map_canvas'), petaOption);

      var kmlLayer = new google.maps.KmlLayer(src, {
        suppressInfoWindows: true,
        preserveViewport: false,
        map: peta
      });
      kmlLayer.addListener('click', function(event) {
        var content = event.featureData.infoWindowHtml;
        var testimonial = document.getElementById('map_canvas');
        testimonial.innerHTML = content;
      });

      ambildatabase2();
      ambildatabase();




    };


    function ambildatabase() {
      // kita bikin dulu array marker dan content info
      var markers = [];
      var info = [];

      <?php
      // koneksi database
      // $link   = mysql_connect('localhost','root','');
      // mysql_select_db('googlemaps_multiicon', $link);

      $query = $this->db->query("SELECT l.id, l.nama, l.gambar, l.alamat, l.telp, l.latittude, l.longitude, k.nama_kategori, k.ikon
                                    FROM lokasi as l, kategori as k
                                    WHERE l.kategori=k.id");

      // $query = $this->db->query("SELECT c.id, c.nama, c.foto, c.alamat, c.telp, c.latittude, c.longitude, k.nama_kategori, k.ikon
      //                               FROM kecamatan as c, kategori as k
      //                               WHERE c.kategori=k.id");
      $i = 0;
      $js = "";

      // kita lakuin looping datanya disini
      // while ($value = mysql_fetch_assoc($query)) {
      foreach ($query->result() as $value) {

        $js .= 'nama[' . $i . '] = "' . $value->nama . '";
                  gambar_kantor[' . $i . '] = "' . base_url() . 'uploads/instansi/' . $value->gambar . '";
                  alamat[' . $i . '] = "' . $value->alamat . '";
                  telpon[' . $i . '] = "' . $value->telp . '";
                  x[' . $i . '] = "' . $value->latittude . '";
                  y[' . $i . '] = "' . $value->longitude . '";
                  set_icon("' . $value->ikon . '");
                  
                  // kita set dulu koordinat markernya
                  var point = new google.maps.LatLng(parseFloat(x[' . $i . ']),parseFloat(y[' . $i . ']));

                  // disini kita masukin konten yang akan ditampilkan di InfoWindow
                  var contentString = "<table>"+
                                              "<tr>"+
                                                  "<td align=center><img class=img-responsive width=150px src=" + gambar_kantor[' . $i . '] + "></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center><br><b>" + nama[' . $i . '] + "</b></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center width=300px>" + alamat[' . $i . '] + "</td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center> Telp: " + telpon[' . $i . '] + "</td>"+
                                              "</tr>"+
                                          "</table>";

                  var infowindow = new google.maps.InfoWindow({
                      content: contentString
                  });
                  

                  tanda = new google.maps.Marker({
                          position: point,
                          map: peta,
                          icon: gambar_tanda,
                          clickable: true
                      });
                  
                 
                  // nah, disini kita buat marker dan infowindow-nya kedalam array
                  markers.push(tanda);
                  info.push(infowindow);

                  // ini fungsi untuk menampilkan konten infowindow kalo markernya diklik
                  google.maps.event.addListener(markers[' . $i . '], "click", function() { info[' . $i . '].open(peta,markers[' . $i . ']); });

                  ';


        $i++;
      }

      // kita tampilin deh output jsnya :D
      echo $js;
      ?>

      // nah untuk yang satu ini...kita push semua markernya kedalam array untuk dikelompokan
      var markerCluster = new MarkerClusterer(peta, markers);

    }


    function ambildatabase2() {
      //lokator kecamatan

      // kita bikin dulu array marker dan content info
      var markers = [];
      var info = [];

      <?php
      // koneksi database
      // $link   = mysql_connect('localhost','root','');
      // mysql_select_db('googlemaps_multiicon', $link);

      // $query = $this->db->query("SELECT l.id, l.nama, l.gambar, l.alamat, l.telp, l.latittude, l.longitude, k.nama_kategori, k.ikon
      //                               FROM lokasi as l, kategori as k
      //                               WHERE l.kategori=k.id");

      $query = $this->db->query("SELECT c.id , c.nama, c.foto, c.alamat, c.telp, c.latittude, c.longitude,c.jlh_desa,c.jlh_kelurahan, k.nama_kategori, k.ikon
                                    FROM kecamatan as c, kategori as k
                                    WHERE c.kategori=k.id");
      $i = 0;
      $js = "";

      // kita lakuin looping datanya disini
      // while ($value = mysql_fetch_assoc($query)) {
      foreach ($query->result() as $value) {

        $js .= 'nama[' . $i . '] = "' . $value->nama . '";
                  id[' . $i . '] = "' . $value->id . '";
                  gambar_kantor[' . $i . '] = "' . base_url() . 'uploads/instansi/' . $value->foto . '";
                  alamat[' . $i . '] = "' . $value->alamat . '";
                  telpon[' . $i . '] = "' . $value->telp . '";
                  jlh_desa[' . $i . '] = "' . $value->jlh_desa . '";
                  jlh_kelurahan[' . $i . '] = "' . $value->jlh_kelurahan . '";
                  x[' . $i . '] = "' . $value->latittude . '";
                  y[' . $i . '] = "' . $value->longitude . '";
                  
                  set_icon("' . $value->ikon . '");
                  
                  // kita set dulu koordinat markernya
                  var point = new google.maps.LatLng(parseFloat(x[' . $i . ']),parseFloat(y[' . $i . ']));

                  // disini kita masukin konten yang akan ditampilkan di InfoWindow
                  var contentString = "<table>"+
                                              "<tr>"+
                                                  "<td align=center><img class=img-responsive width=150px src=" + gambar_kantor[' . $i . '] + "></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center><br><b>" + nama[' . $i . '] + "</b></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center width=300px> <b>Alamat Kantor Camat:</b></br>" + alamat[' . $i . '] + "</td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center><b> Telp: </b>" + telpon[' . $i . '] + "</td>"+
                                              "</tr>"+
                                              "<td align=center><b> Jumlah Desa: </b>" + jlh_desa[' . $i . '] + "</td>"+
                                              "</tr>"+
                                              "<td align=center><b> Jumlah Kelurahan: </b>" + jlh_kelurahan[' . $i . '] + "</td>"+
                                              "</tr>"+
                                              "<td align=center><a href=web/kecamatandetail/"+ id[' . $i . '] +">>Selengkapnya</a></td>"+
                                              "</tr>"+
                                          "</table>";

                  var infowindow = new google.maps.InfoWindow({
                      content: contentString
                  });
                  

                  tanda = new google.maps.Marker({
                          position: point,
                          map: peta,
                          icon: gambar_tanda,
                          clickable: true
                      });
                  
                 
                  // nah, disini kita buat marker dan infowindow-nya kedalam array
                  markers.push(tanda);
                  info.push(infowindow);

                  // ini fungsi untuk menampilkan konten infowindow kalo markernya diklik
                  google.maps.event.addListener(markers[' . $i . '], "click", function() { info[' . $i . '].open(peta,markers[' . $i . ']); });

                  ';


        $i++;
      }

      // kita tampilin deh output jsnya :D
      echo $js;
      ?>

      // nah untuk yang satu ini...kita push semua markernya kedalam array untuk dikelompokan
      var markerCluster = new MarkerClusterer(peta, markers);

    }



    // fungsi inilah yang akan menampilkan gambar ikon sesuai dengan kategori markernya sendiri
    function set_icon(ikon) {
      if (ikon == "") {} else {
        gambar_tanda = baseurl + "uploads/icon/" + ikon;
      }
    }



    google.maps.event.addDomListener(window, 'load', peta_awal);
  </script>
</head>

<body onload="peta_awal()">

  <!-- <body onload="initialize()"> -->

  <body>

    <div class="container bg_content">
      <div class="container">

        <div class="col-sm-12 header">
          <img src="<?= base_url() . 'uploads/' ?>imgheader3.png" class="img-responsive">
        </div><!-- ./ HEADER -->

        <div class="col-sm-12 header-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url() . 'web' ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url() . 'web/profil' ?>"><i class="fa fa-suitcase"></i> Profil</a></li>
            <li><a href="<?= base_url() . 'web/lokasi' ?>"><i class="fa fa-map-o"></i> Lokasi Investasi</a></li>
            <li><a href="<?= base_url() . 'web/kecamatan' ?>"><i class="fa fa-map-o"></i> Kecamatan</a></li>
            <!-- <li><a href="#"><i class="fa fa-map-marker"></i> Derection</a></li> -->
            <li><a href="<?= base_url() . 'web/berita' ?>"><i class="fa fa-newspaper-o"></i> Berita</a></li>
            <li><a href="<?= base_url() . 'web/komentar' ?>"><i class="fa fa-comments-o"></i> Komentar</a></li>
          </ul>
        </div><!-- ./ HEADER-MENU -->

        <?php echo $contents ?>

        <div class="col-sm-12 bottom-footer">
          Page rendered in <b>{elapsed_time}</b> seconds. Version <b>1.0</b><br>
          Sistem Informasi Manajemen Investasi Kab. Langkat<br>
          Copyright © 2021, Develop By IT DPMP2TSP KAB. LANGKAT
        </div>
        <!-- ./ BOTTOM-FOOTER -->
      </div>
    </div>


    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url() . 'assets/' ?>plugins/jQuery/jquery-2.2.3.min.js">
      < /scrip> <
      script src = "<?= base_url() . 'assets/' ?>bootstrap/bootstrap.min.js" >
    </script>
    <!-- DataTables -->
    <script src="<?= base_url() . 'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() . 'assets/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Page script -->
    <script>
      $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>
  </body>

</html>