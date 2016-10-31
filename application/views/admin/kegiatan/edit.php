<?php echo $message;?>
<?php echo validation_errors();?>

<div class="page-header">
      <h3>Edit Data <small>Kegiatan</small></h3>
    </div>
<form class="form-horizontal" action="" method="post">

    <div class="form-group">
        <label class="col-lg-3 control-label">Nama Kegiatan</label>
        <div class="col-lg-7">
            <input type="text" name="namaKeg" class="form-control" value="<?php echo $kegiatan['namaKeg'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Deskripsi</label>
        <div class="col-lg-7">
            <textarea type="text" name="deskripsiKeg" class="form-control"><?php echo $kegiatan['deskripsiKeg'];?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Tanggal</label>
        <div class="col-lg-7">
            <input type="date" name="tanggalKeg" id="tanggal" class="form-control" value="<?php echo $kegiatan['tanggalKeg'];?>">
        </div>
    </div>

    <div class="form-group well" align="right">
        <a href="<?php echo site_url('admin/kegiatan');?>" class="btn btn-default">Kembali</a>
        <button class="btn btn-primary" id="simpan"><i class="glyphicon glyphicon-save"></i> Simpan</button>
    </div>
</form>