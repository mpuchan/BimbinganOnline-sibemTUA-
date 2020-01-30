<?php
$no = 1;
foreach ($dataDosen as $dosen) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $dosen->nip; ?></td>
    <td><?php echo $dosen->namadosen; ?></td>
    <td><?php echo $dosen->alamat; ?></td>
    <td><?php echo $dosen->notelp; ?></td>
    <td><?php echo $dosen->pangkat; ?></td>
    <td class="text-center" style="min-width:230px;">
      <button class="btn btn-warning update-datadosen" data-id="<?php echo $dosen->nip; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      <button class="btn btn-danger konfirmasiHapus-dosen" data-id="<?php echo $dosen->nip; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

    </td>
  </tr>
<?php
  $no++;
}
?>