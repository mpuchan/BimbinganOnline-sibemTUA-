<?php
$no = 1;
foreach ($dataUser as $user) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><img class="nav-user-photo" src="<?php echo base_url(); ?>assets/img/mahasiswa/<?php echo $user->profile; ?>" class="user-image" alt="User Image" style="width: 30px;height: 30px;"></td>
        <td><?php echo $user->username; ?></td>
        <td><?php echo $user->nama; ?></td>
        <td><?php
            if ($user->roleid == 1) {
                echo "Admin";
            } elseif ($user->roleid == 2) {
                echo "Mahasiswa";
            } else {
                echo "dosen";
            } ?></td>
        <td class="text-center" style="min-width:230px;">
            <button class="btn btn-warning update-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
            <button class="btn btn-danger konfirmasiHapus-user" data-id="<?php echo $user->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

        </td>
    </tr>
<?php
    $no++;
}
?>