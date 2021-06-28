<!-- ./SIDEBAR -->

<div class="col-sm-12 content">
  <div class="panel">
    <!-- <div class="panel-heading">
            <h3 class="panel-title">Berita</h3>
          </div> -->
    <div class="panel-body" style="padding:0;">
      <div class="detailberita">
        <!-- <h2 style="padding:0;margin:0;"><a href="<?= base_url() . 'web/DetailKecamatan/' . $bo['id'] ?>"><?= $bo['sejarah'] ?></a> </h2> -->
        <h2 style="padding:0;margin:0;"> Detail <?= $bo['nama'] ?></h2>
        <!-- <div class="well well-sm" style="margin-top:10px;padding:5px;">
          <i class="fa fa-user"></i> By <?= $bo['penulis'] ?> |
          <i class="fa fa-calendar"></i> <?= $bo['tanggal'] ?> |
          <i class="fa fa-eye"></i> <?= $bo['dibaca'] ?> Kali
        </div>
        <img class="img-responsive img-thumbnail" src="<?= base_url() . 'uploads/berita/' . $bo['gambar'] ?>"> -->
        <b>Alamat Kantor Camat <?= $bo['alamat'] ?></b>
        </br>
        <b>Nama Camat <?= $bo['namacamat'] ?></b>
        <h3>Sejarah Singkat</h3>
        <p><?= $bo['sejarah'] ?>
        <h3>Jumlah Desa/kelurahan</h3>
        <p><?= $bo['jlh_desa'] ?> Desa</p>
        <p><?= $bo['jlh_kelurahan'] ?> Kelurahan</p>
        <h3>Total Populasi</h3>
        <p><?= $bo['populasi'] ?> jiwa
        <h3>Luas Wilayah</h3>
        <p><?= $bo['luas'] ?> KM<sup>2</sup>
        <h3>Jenis Investasi</h3>
        <p><?= $bo['jns_investasi'] ?>
        <h3>Jumlah Investasi</h3>
        <p><?= $bo['jlh_investasi'] ?>
      </div>
    </div>
  </div>
</div>
<!-- ./CONTENT -->

<div class="col-sm-12 content" style="padding-left:10px;">
  <div class="panel">
    <!-- <div class="panel-heading">
            <h3 class="panel-title">Peta Lokasi</h3>
          </div> -->
    <div class="panel-body" style="border:1px solid #ddd;padding: 0;">

      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj-hFGBMNwgXz91WdQn5O1N6mgxKJcX1U&callback=initMap"></script>

      <script>
        var marker;

        function initialize() {





          // Variabel untuk menyimpan informasi (desc)
          var infoWindow = new google.maps.InfoWindow;

          //  Variabel untuk menyimpan peta Roadmap
          var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }

          // Pembuatan petanya
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          //seharusnya ini kml layer
          var src = 'https://perizinan.langkatkab.go.id/kml/bataskecamatanfix_project.kml';
          var kmlLayer = new google.maps.KmlLayer(src, {
            suppressInfoWindows: true,
            preserveViewport: false,
            map: map
          });
          kmlLayer.addListener('click', function(event) {
            var content = event.featureData.infoWindowHtml;
            var testimonial = document.getElementById('map-canvas');
            testimonial.innerHTML = content;
          });



          // Variabel untuk menyimpan batas kordinat
          var bounds = new google.maps.LatLngBounds();




          // Pengambilan data dari database
          <?php
          $id = $this->uri->segment(3);
          $as = $this->db->query("SELECT l.id, l.nama,l.telp, l.alamat, l.latittude, l.longitude, k.nama_kategori, k.ikon FROM kecamatan as l, kategori as k WHERE l.kategori=k.id AND l.id = $id");
          foreach ($as->result() as $data) {
            $nama   = $data->nama;
            $alamat   = $data->alamat;
            $telp   = $data->telp;
            $lat    = $data->latittude;
            $lon    = $data->longitude;
            $icon   = $data->ikon;
          ?>

            var image = "<?php echo base_url() . 'uploads/icon/' . $icon ?> ";

          <?php

            echo ("addMarker($lat, $lon, '<b>$nama</b><br>$alamat<br>Telp: $telp');\n");
          }

          ?>

          // Proses membuat marker 
          function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);

            var marker = new google.maps.Marker({
              map: map,
              position: lokasi,
              icon: image
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }

          // Menampilkan informasi pada masing-masing marker yang diklik
          function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
              infoWindow.setContent(html);
              infoWindow.open(map, marker);
            });
          }







        }
        google.maps.event.addDomListener(window, 'load', initialize);
      </script>
      <div id="map-canvas" style="width: auto; height: 600px;"></div>

    </div>
  </div>
</div>