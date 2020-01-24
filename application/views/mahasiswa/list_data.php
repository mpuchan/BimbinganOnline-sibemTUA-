<?php
foreach ($dataMahasiswa as $mahasiswa) {
?>
    <tr>
        <td class="center">
            <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
            </label>
        </td>

        <td><?php echo $mahasiswa->nim; ?></td>
        <td><?php echo $mahasiswa->namamahasiswa; ?></td>

        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-dataMahasiswa" data-id="<?php echo $mahasiswa->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
            <button class="btn btn-danger konfirmasiHapus-mahasiswa" data-id="<?php echo $mahasiswa->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        </td>
    </tr>
<?php
}
?>