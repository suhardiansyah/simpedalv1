    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Cpanel</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Kecamatan</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <?= form_open('dashboard/kecamatan') ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Kecamatan</label>
                  <input name="id" type="hidden" value="<?= $l['id'] ?>">
                  <input name="nama" type="text" class="form-control" value="<?= $l['nama'] ?>">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" class="form-control select2" style="width: 100%;">
                    <?php foreach ($k->result() as $r) {
                      echo "<option value='$r->id'>$r->nama_kategori</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Camat</label>
                  <input name="alamat" class="form-control"><?= $l['namacamat'] ?></input>
                </div>
                <div class="form-group">
                  <label>Alamat Kantor Camat</label>
                  <textarea name="alamat" class="form-control"><?= $l['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                  <label>Telepon Kantor Camat</label>
                  <input name="telp" type="text" class="form-control" value="<?= $l['telp'] ?>">
                </div>

                <div class="form-group">
                  <label>Sejarah Singkat</label>
                  <textarea name="sejarah" class="form-control ckeditor"><?= $l['sejarah'] ?></textarea>
                </div>

                <div class="form-group">
                  <label>Total Populasi</label>
                  <input name="populasi" type="text" class="form-control" value="<?= $l['populasi'] ?>">
                </div>

                <div class="form-group">
                  <label>Jumlah Desa</label>
                  <input name="jlh_desa" type="text" class="form-control" value="<?= $l['jlh_desa'] ?>">
                </div>

                <div class="form-group">
                  <label>Jumlah Kelurahan</label>
                  <input name="jlh_kelurahan" type="text" class="form-control" value="<?= $l['jlh_kelurahan'] ?>">
                </div>
                <div class="form-group">
                  <label>Luas Wilayah</label>
                  <input name="luas" type="text" class="form-control" value="<?= $l['luas'] ?>">
                </div>

                <div class="form-group">
                  <label>Latittude</label>
                  <input name="lat" type="text" class="form-control" value="<?= $l['latittude'] ?>">
                </div>
                <div class="form-group">
                  <label>Longitude</label>
                  <input name="long" type="text" class="form-control" value="<?= $l['longitude'] ?>">
                </div>

                <div class="form-group">
                  <label>Jenis Investasi</label>
                  <input name="jns_investasi" type="text" class="form-control" value="<?= $l['jns_investasi'] ?>">
                </div>

                <div class="form-group">
                  <label>Jumlah Investasi</label>
                  <input name="jlh_investasi" type="text" class="form-control" value="<?= $l['jlh_investasi'] ?>">
                </div>

                <div class="form-group">
                  <label>Foto</label>
                  <input name="foto" type="file" class="form-control" value="<?= $l['foto'] ?>">
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button name="update" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Update</button>
                <a href="<?= base_url() . 'dashboard/lokasi' ?>" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i> Kembali</a>
              </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>