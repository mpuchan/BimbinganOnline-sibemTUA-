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
		tampilPosisi();
		tampilKota();
		tampilJurusan();
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

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/delete'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilKota();
				$('.msg').html(data);
				effect_msg();
			})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/update'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-kota').modal('show');
			})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Kota/detail'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#tabel-detail').dataTable({
					"paging": true,
					"lengthChange": false,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
				$('#detail-kota').modal('show');
			})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Kota/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKota();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-kota").reset();
					$('#tambah-kota').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilKota();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-kota").reset();
					$('#update-kota').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function() {
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
	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Posisi/delete'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#konfirmasiHapus').modal('hide');
				tampilPosisi();
				$('.msg').html(data);
				effect_msg();
			})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Posisi/update'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#update-posisi').modal('show');
			})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Posisi/detail'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);
				$('#tabel-detail').dataTable({
					"paging": true,
					"lengthChange": false,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
				$('#detail-posisi').modal('show');
			})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilPosisi();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-posisi").reset();
					$('#tambah-posisi').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				tampilPosisi();
				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-update-posisi").reset();
					$('#update-posisi').modal('hide');
					$('.msg').html(out.msg);
					effect_msg();
				}
			})

		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function() {
		$('.form-msg').html('');
	})
</script>