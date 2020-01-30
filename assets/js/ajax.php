<script type="text/javascript">
  var MyTable = $('#list-data').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  window.onload = function() {
    tampilMahasiswa();
    tampilJurusan();
    tampilProdi();
    tampilUser();

    <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
    ?>
  }

  function refresh() {
    MyTable = $('#list-data').dataTable();
  }

  function effect_msg_form() {
    // $('.form-msg').hide();
    $('.form-msg').show(1000);
    setTimeout(function() {
      $('.form-msg').fadeOut(1000);
    }, 3000);
  }

  function effect_msg() {
    // $('.msg').hide();
    $('.msg').show(1000);
    setTimeout(function() {
      $('.msg').fadeOut(1000);
    }, 3000);
  }

  function tampilMahasiswa() {
    $.get('<?php echo base_url('Mahasiswa/tampil'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-mahasiswa').html(data);
      refresh();
    });
  }
  var id_mahasiswa;
  $(document).on("click", ".konfirmasiHapus-mahasiswa", function() {
    id_mahasiswa = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataMahasiswa", function() {
    var id = id_mahasiswa;

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Mahasiswa/delete'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        tampilMahasiswa();
        $('.msg').html(data);
        effect_msg();
      })
  })

  $(document).on("click", ".update-dataMahasiswa", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Mahasiswa/update'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#tempat-modal').html(data);
        $('#update-mahasiswa').modal('show');
      })
  })

  $('#form-tambah-mahasiswa').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Mahasiswa/prosesTambah'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilMahasiswa();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-tambah-mahasiswa").reset();
          $('#tambah-mahasiswa').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $(document).on('submit', '#form-update-mahasiswa', function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Mahasiswa/prosesUpdate'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilMahasiswa();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-update-mahasiswa").reset();
          $('#update-mahasiswa').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $('#tambah-mahasiswa').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  $('#update-mahasiswa').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  // Jurusan

  function tampilJurusan() {
    $.get('<?php echo base_url('Jurusan/tampil'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-jurusan').html(data);
      refresh();
    });
  }

  var id_jurusan;
  $(document).on("click", ".konfirmasiHapus-jurusan", function() {
    id_jurusan = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataJurusan", function() {
    var id = id_jurusan;

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Jurusan/delete'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        tampilJurusan();
        $('.msg').html(data);
        effect_msg();
      })
  })

  $(document).on("click", ".update-dataJurusan", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Jurusan/update'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#tempat-modal').html(data);
        $('#update-jurusan').modal('show');
      })
  })

  $('#form-tambah-jurusan').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Jurusan/prosesTambah'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilJurusan();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-tambah-jurusan").reset();
          $('#tambah-jurusan').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $(document).on('submit', '#form-update-jurusan', function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Jurusan/prosesUpdate'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilJurusan();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-update-jurusan").reset();
          $('#update-jurusan').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $('#tambah-jurusan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  $('#update-jurusan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  //Prodi 
  function tampilProdi() {
    $.get('<?php echo base_url('Prodi/tampil'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-prodi').html(data);
      refresh();
    });
  }
  var id_prodi;
  $(document).on("click", ".konfirmasiHapus-prodi", function() {
    id_prodi = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataProdi", function() {
    var id = id_prodi;

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Prodi/delete'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        tampilProdi();
        $('.msg').html(data);
        effect_msg();
      })
  })

  $(document).on("click", ".update-dataProdi", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('Prodi/update'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#tempat-modal').html(data);
        $('#update-prodi').modal('show');
      })
  })

  $('#form-tambah-prodi').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Prodi/prosesTambah'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilProdi();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-tambah-prodi").reset();
          $('#tambah-prodi').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $(document).on('submit', '#form-update-prodi', function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('Prodi/prosesUpdate'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilProdi();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-update-prodi").reset();
          $('#update-prodi').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $('#tambah-prodi').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  $('#update-prodi').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })
  //User
  function tampilUser() {
    $.get('<?php echo base_url('User/tampil'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-user').html(data);
      refresh();
    });
  }
  var id_user;
  $(document).on("click", ".konfirmasiHapus-user", function() {
    id_user = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataUser", function() {
    var id = id_user;

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('User/delete'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#konfirmasiHapus').modal('hide');
        tampilUser();
        $('.msg').html(data);
        effect_msg();
      })
  })

  $(document).on("click", ".update-dataUser", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "<?php echo base_url('User/update'); ?>",
        data: "id=" + id
      })
      .done(function(data) {
        $('#tempat-modal').html(data);
        $('#update-user').modal('show');
      })
  })

  $('#form-tambah-user').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('User/prosesTambah'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilUser();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-tambah-user").reset();
          $('#tambah-user').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $(document).on('submit', '#form-update-user', function(e) {
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: '<?php echo base_url('User/prosesUpdate'); ?>',
        data: data
      })
      .done(function(data) {
        var out = jQuery.parseJSON(data);

        tampilUser();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-update-user").reset();
          $('#update-user').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      })

    e.preventDefault();
  });

  $('#tambah-user').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })

  $('#update-user').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
  })
</script>