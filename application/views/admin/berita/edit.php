<div class="page-header">
      <h3>Edit Data <small>Berita</small></h3>
    </div>
<form class="form-horizontal" action="" method="post">

    <div class="form-group">
        <label class="col-lg-3 control-label">Judul</label>
        <div class="col-lg-7">
            <input type="text" name="judul" class="form-control" value="<?php echo $berita['judul'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Ringkasan</label>
        <div class="col-lg-7">
            <textarea type="text" name="ringkasan" class="form-control"><?php echo $berita['ringkasan'];?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Isi Berita</label>
        <div class="col-lg-7">
            <textarea type="text" name="isi" class="form-control"><?php echo $berita['isi'];?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">Tanggal</label>
        <div class="col-lg-7">
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $berita['tanggal'];?>">
        </div>
    </div>
    <div class="form-group well" align="right">
        <a href="<?php echo site_url('admin/berita');?>" class="btn btn-default">Kembali</a>
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
    </div>
</form>