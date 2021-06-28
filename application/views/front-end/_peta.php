      <div class="col-sm-4 sidebar">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">List Lokasi</h3>
          </div>
          <div class="panel-body">
            <?php foreach ($l->result() as $r) { ?>
              <blockquote style="padding:0 10px;">
                <p><?= $r->nama ?></p>
                <footer><?= $r->alamat ?> <cite title="Source Title"><?= $r->telp ?></cite></footer>
              </blockquote>
            <?php } ?>
            <a class="btn btn-warning btn-flat" style="float:right;" href="<?= base_url() . 'web/lokasi' ?>"><i class="fa fa-eye"></i> View all location</a>
          </div>
        </div>

      </div>
      <!-- ./SIDEBAR -->

      <div class="col-sm-8 content">
        <div class="panel">
          <!-- <div class="panel-heading">
            <h3 class="panel-title">Peta Lokasi</h3>
          </div> -->
          <div class="panel-body" style="border:1px solid #ddd;padding: 0;">

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj-hFGBMNwgXz91WdQn5O1N6mgxKJcX1U&callback=initMap"></script>

            <div id="map_canvas" style="width: auto; height: 600px;"></div>

          </div>
        </div>
      </div>
      <!-- ./CONTENT -->

      <!-- <div class="col-sm-12 banner"> -->
      <!-- <img src=" echo base_url().'uploads/banners/no-banner-728x90.jpg' ?>"> -->
      <!-- </div> -->

      <!-- <div class="col-sm-12 top-footer">
        <div class="col-sm-4 left">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Berita Terbaru</h3>
            </div>
            <div class="panel-body">
              <?php
              foreach ($bt->result() as $r) { ?>
                <div class="media">
                  <div class="media-left media-top">
                    <a href="<?= base_url() . 'web/beritadetail/' . $r->id_berita ?>">
                      <img class="media-object" src="<?= base_url() . 'uploads/berita/' . $r->gambar ?>" width="64">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?= base_url() . 'web/beritadetail/' . $r->id_berita ?>"><?= $r->judul ?></a> </h4>
                    <?= substr($r->isi_berita, 0, 45) . "..." ?>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-4 center">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Berita Popular</h3>
            </div>
            <div class="panel-body">
              <?php
              foreach ($bp->result() as $r) { ?>
                <div class="media">
                  <div class="media-left media-top">
                    <a href="<?= base_url() . 'web/beritadetail/' . $r->id_berita ?>">
                      <img class="media-object" src="<?= base_url() . 'uploads/berita/' . $r->gambar ?>" width="64">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?= base_url() . 'web/beritadetail/' . $r->id_berita ?>"><?= $r->judul ?></a> </h4>
                    <?= substr($r->isi_berita, 0, 45) . "..." ?>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-4 right">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Contact</h3>
            </div>
            <div class="panel-body">
              <address>
                <strong>Alamat</strong><br>
                Jl. Imam Bonjol - Stabat
              </address>

              <address>
                <abbr title="Phone">Telepon :</abbr> (021) 8910389<br>
                <abbr title="email">Email</abbr> :</abbr> <a href="mailto:#">perizinanlangkat@gmail.com</a><br>
                <abbr title="website">Website :</abbr> <a href="http://perizinan.langkatkab.go.id">perizinan.langkatkab.go.id</a>
              </address>
            </div>
          </div>
        </div>
      </div> -->

      <!-- ./ TOP-FOOTER -->