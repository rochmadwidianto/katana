
<?php echo $message;?>
<?php echo validation_errors();?>

<div class="page-header">
      <h3>Edit Data <small>Anggota</small></h3>
    </div>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-lg-3 control-label">Nama</label>
        <div class="col-lg-7">
            <input type="text" name="namaAgg" class="form-control" value="<?php echo $anggota['namaAgg'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Jenis Kelamin</label>
        <div class="col-lg-7">
           <select class="form-control" name="jk">
                <option value="1" <?php echo $anggota['jk'] == "1" ? "selected" : ""; ?>>Laki - laki</option>
                <option value="2" <?php echo $anggota['jk'] == "2" ? "selected" : ""; ?>>Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Agama</label>
        <div class="col-lg-7">
            <select class="form-control" name="agamaAgg">
                <option value="1" <?php echo $anggota['agamaAgg'] == "1" ? "selected" : ""; ?>>Islam</option>
                <option value="2" <?php echo $anggota['agamaAgg'] == "2" ? "selected" : ""; ?>>Kristen</option>
                <option value="3" <?php echo $anggota['agamaAgg'] == "3" ? "selected" : ""; ?>>Katolik</option>
                <option value="4" <?php echo $anggota['agamaAgg'] == "4" ? "selected" : ""; ?>>Hindu</option>
                <option value="5" <?php echo $anggota['agamaAgg'] == "5" ? "selected" : ""; ?>>Budha</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Tanggal Lahir</label>
        <div class="col-lg-7">
            <input type="date" name="ttlAgg" id="tanggal" class="form-control" value="<?php echo $anggota['ttlAgg'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Alamat</label>
        <div class="col-lg-7">
            <input type="text" name="alamatAgg" class="form-control" value="<?php echo $anggota['alamatAgg'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">No. HP</label>
        <div class="col-lg-7">
            <input type="text" name="hpAgg" class="form-control" value="<?php echo $anggota['hpAgg'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Status</label>
        <div class="col-lg-7">
            <select class="form-control" name="statusAgg">
                <option value="1" <?php echo $anggota['statusAgg'] == "1" ? "selected" : ""; ?>>Belum Menikah</option>
                <option value="2" <?php echo $anggota['statusAgg'] == "2" ? "selected" : ""; ?>>Menikah</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Pekerjaan</label>
        <div class="col-lg-7">
            <input type="text" name="pekerjaanAgg" class="form-control" value="<?php echo $anggota['pekerjaanAgg'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Foto</label>
        <div class="col-lg-7">
            <img src="<?php echo base_url('assets/img/anggota/'.$anggota['fotoAgg']);?>" width="100px" height="100px">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label"></label>
        <div class="col-lg-7">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group well" align="right">
        <a href="<?php echo site_url('admin/anggota/anggota');?>" class="btn btn-default">Kembali</a>
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
    </div>
</form>