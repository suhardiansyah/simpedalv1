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
                <h3 class="box-title">Tambah Kecamatan</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <?= form_open('dashboard/kecamatan') ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Kecamatan</label>
                  <input name="nama" type="text" class="form-control" placeholder="Nama Kecamatan" required="">
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
                  <input name="namacamat" class="form-control" placeholder="Nama Pejabat Camat" required=""></input>
                </div>
                <div class="form-group">
                  <label>Alamat Kantor Camat</label>
                  <textarea name="alamat" class="form-control" placeholder="Alamat Kantor Camat" required=""></textarea>
                </div>

                <div class="form-group">
                  <label>Telepon Kantor Camat</label>
                  <input name="telp" type="text" class="form-control" placeholder="Telephon Kantor Camat" required="">
                </div>

                <div class="form-group">
                  <label>Sejarah Singkat</label>
                  <textarea name="sejarah" class="form-control ckeditor" placeholder="Sejarah singkat" rows="5" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Total Populasi</label>
                  <input name="populasi" type="text" class="form-control" placeholder="Total Penduduk" required="">
                </div>

                <div class="form-group">
                  <label>Jumlah Desa</label>
                  <input name="jlh_desa" type="text" class="form-control" placeholder="Jumlah Desa" required="">
                </div>

                <div class="form-group">
                  <label>Jumlah Kelurahan</label>
                  <input name="jlh_kelurahan" type="text" class="form-control" placeholder="Jumlah Kelurahan" required="">
                </div>
                <div class="form-group">
                  <label>Luas Wilayah</label>
                  <input name="luas" type="text" class="form-control" placeholder="Luas Wilayah Kilometer Persegi" required="">
                </div>
                <div class="form-group">
                  <label>Latittude</label>
                  <input name="lat" type="text" class="form-control" placeholder="-3.0291407" required="">
                </div>
                <div class="form-group">
                  <label>Longitude</label>
                  <input name="long" type="text" class="form-control" placeholder="120.2085258" required="">
                </div>
                <div class="form-group">
                  <label>Jenis Investasi</label>
                  <input name="jns_investasi" type="text" class="form-control" placeholder="Perkebunan, Industri, dll" required="">
                </div>
                <div class="form-group">
                  <label>Jumlah Investasi</label>
                  <input name="jlh_investasi" type="text" class="form-control" placeholder="Rp.500.000.000,-" required="">
                </div>

                <div class="form-group">
                  <label>Foto</label>
                  <input name="foto" type="file" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button name="simpan" type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?= base_url() . 'dashboard/kecamatan' ?>" class="btn btn-warning btn-flat"><i class="fa fa-retweet"></i> Kembali</a>
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