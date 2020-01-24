<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="form-msg"></div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;">Update Data Jurusan</h3>

    <form id="form-update-jurusan" method="POST">
        <input type="hidden" name="kode_jurusan" value="<?php echo $dataJurusan->kode_jurusan; ?>">
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
            </span>
            <input type="text" class="form-control" placeholder="Nama Jurusan" name="namajurusan" aria-describedby="sizing-addon2" value="<?php echo $dataJurusan->namajurusan; ?>">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
            </span>
            <input type="text" class="form-control" placeholder="Nama Kajur" name="namakajur" aria-describedby="sizing-addon2" value="<?php echo $dataJurusan->namakajur; ?>">
        </div>
        <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
            </span>
            <input type="text" class="form-control" placeholder="No Telp" name="notelp" aria-describedby="sizing-addon2" value="<?php echo $dataJurusan->notelp; ?>">
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
            </div>
        </div>
    </form>
</div>