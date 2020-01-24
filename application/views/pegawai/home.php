<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  </div>

  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-xs-12">
        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
          <div class="col-md-2" style="padding: 0;">
            <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pegawai"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
          </div>
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
          <table id="dynamic-table" class="table table-bordered table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="center">
                  <label class="pos-rel">
                    <input type="checkbox" class="ace" />
                    <span class="lbl"></span>
                  </label>
                </th>
                <th>Nama</th>
                <th>No Telp</th>
                <th class="hidden-480">Asal kota</th>

                <th>
                  <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                  Jenis Kelamin
                </th>
                <th class="hidden-480">Posisi</th>

                <th style="text-align: center;">Aksi</th>
              </tr>
            </thead>

            <tbody id="data-pegawai">


            </tbody>
          </table>
        </div>
      </div>

      <?php echo $modal_tambah_pegawai; ?>

      <div id="tempat-modal"></div>

      <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
      <?php
      $data['judul'] = 'Pegawai';
      $data['url'] = 'Pegawai/import';
      echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
      ?>