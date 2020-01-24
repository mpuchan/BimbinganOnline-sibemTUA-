<?php
$no = 1;
foreach ($dataJurusan as $jurusan) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $jurusan->kode_jurusan; ?></td>
        <td><?php echo $jurusan->namajurusan; ?></td>
        <td><?php echo $jurusan->namakajur; ?></td>
        <td><?php echo $jurusan->notelp; ?></td>
        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-dataJurusan" data-id="<?php echo $jurusan->kode_jurusan; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
            <button class="btn btn-danger konfirmasiHapus-jurusan" data-id="<?php echo $jurusan->kode_jurusan; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

        </td>
    </tr>
<?php
    $no++;
}
?>