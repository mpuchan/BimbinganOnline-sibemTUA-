<div class="col-md-offset-1 col-md-12 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Mahasiswa</h3>

  <form id="form-tambah-mahasiswa" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-record"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nim" name="nim" value="<?php echo date("Y") ?>" aria-describedby="sizing-addon2">
        </div>
      </div>
      <div class="input-group form-group">
        <span class="input-group-addon " id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="namamahasiswa" aria-describedby="sizing-addon2">
      </div>
    </div>
    <div class="form-group col-md-12">
      <div class="input-group form-group">
        <span class="input-group-addon " id="sizing-addon2">
          <i class="glyphicon glyphicon-home"></i>
        </span>
        <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="No Telp" name="notelp" aria-describedby="sizing-addon2">
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="menu-icon fa fa-university "></i>
          </span>
          <select name="kodejurusan" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
            <?php
            foreach ($dataJurusan as $jurusan) {
            ?>
              <option value="<?php echo $jurusan->kode_jurusan; ?>">
                <?php echo $jurusan->namajurusan; ?>
              </option>
            <?php
            }
            ?>
          </select>

        </div>
      </div>
      <div class="input-group form-group">
        <span class="input-group-addon " id="sizing-addon2">
          <i class="menu-icon fa fa-university "></i>
        </span>
        <select name="kodeprodi" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
          <?php
          foreach ($dataProdi as $prodi) {
          ?>
            <option value="<?php echo $prodi->kodeprodi; ?>">
              <?php echo $prodi->namaprodi; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group col-md-12">
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2">
      </div>
    </div>
    <div class="form-group col-md-12">
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-eye-close"></i>
        </span>
        <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon2">
      </div>
    </div>

    <input type="hidden" class="form-control" placeholder="Foto" name="image" aria-describedby="sizing-addon2" value="mahasiswa1.jpg">

    <div class="form-group col-md-12">
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">

        </span>
        <select name="isactive" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
          <option value="0">pilih status</option>
          <option value="0">nonaktif</option>
          <option value="1">aktif</option>
        </select>
      </div>
    </div>

    <input type="hidden" class="form-control" placeholder="datacreate" name="datacreate" value="<?php echo  "" . date("Y/m/d") . ""; ?>" aria-describedby="sizing-addon2">
    <input type="hidden" class="form-control" placeholder="dataupdate" name="dataupdate" value="<?php echo  "" . date("Y/m/d") . ""; ?>" aria-describedby=" sizing-addon2">

    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  $(function() {
    $(".select2").select2();
  });
</script>