<?php
$no = 1;
foreach ($dataMahasiswa as $mahasiswa) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $mahasiswa->nim; ?></td>
        <td><img class="nav-user-photo" src="<?php echo base_url(); ?>assets/img/mahasiswa/<?php echo $mahasiswa->image; ?>" class="user-image" alt="User Image" style="width: 30px;height: 30px;"></td>
        <td><?php echo $mahasiswa->namamahasiswa; ?></td>
        <td><?php echo $mahasiswa->alamat; ?></td>
        <td><?php echo $mahasiswa->notelp; ?></td>
        <td><?php echo $mahasiswa->datacreate; ?></td>

        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-dataMahasiswa" data-id="<?php echo $mahasiswa->nim; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
            <button class="btn btn-danger konfirmasiHapus-mahasiswa" data-id="<?php echo $mahasiswa->nim; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        </td>
    </tr>
<?php
    $no++;
}
?>