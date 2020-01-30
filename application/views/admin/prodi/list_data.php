<?php
$no = 1;
foreach ($dataProdi as $prodi) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $prodi->kodeprodi; ?></td>
        <td><?php echo $prodi->namaprodi; ?></td>
        <td><?php echo $prodi->nip; ?></td>
        <td><?php echo $prodi->kaprodi; ?></td>
        <td><?php echo $prodi->notelp; ?></td>
        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-dataProdi" data-id="<?php echo $prodi->kodeprodi; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
            <button class="btn btn-danger konfirmasiHapus-prodi" data-id="<?php echo $prodi->kodeprodi; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

        </td>
    </tr>
<?php
    $no++;
}
?>