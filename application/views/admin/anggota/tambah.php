<?php echo validation_errors();?>

<div class="page-header">
      <h3><i class="glyphicon glyphicon-plus"></i>  Tambah <small>Anggota</small></h3>
    </div>
<div class="alert alert-info alert-dismissable" id="wrapper" >
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Anda dapat menambahkan anggota dengan mengisi <i>form</i> dibawah ini dengan lengkap.</br> Gunakan data sesuai dengan identitas sebenarnya. 
</div>
<div class="well">
    <form class="form-horizontal" action="<?php echo site_url('admin/submit');?>" method="post" enctype="multipart/form-data">

    <div class="form-group" style="margin-top:3%">
        <label class="col-lg-3 control-label">Nama Lengkap</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Masukkan Nama Lengkap" name="namaAgg" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Jenis Kelamin</label>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-4">
            <?php  echo form_dropdown('jk',array('1'=>'Laki - Laki','2'=>'Perempuan'),'',"class='form-control'");?>
                </div>
                <div class="col-lg-4">
                    <label>Agama</label>
                </div>
                <div class="col-lg-4">
            <?php  echo form_dropdown('agamaAgg',array('1'=>'ISLAM','2'=>'KRISTEN','3'=>'KATOLIK','4'=>'HINDU','5'=>'BUDHA'),'',"class='form-control'");?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Tanggal Lahir</label>
        <div class="col-lg-7">
            <input type="date" placeholder="Masukkan Tanggal Lahir" name="ttlAgg" id="tanggal" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Alamat</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Masukkan Alamat Lengkap" name="alamatAgg" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Nomor HP</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Masukkan Nomor HP" name="hpAgg" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Status</label>
        <div class="col-lg-7">
            <?php  echo form_dropdown('statusAgg',array('1'=>'BELUM MENIKAH','2'=>'MENIKAH'),'',"class='form-control'");?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Pekerjaan</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Masukkan Pekerjaan" name="pekerjaanAgg" class="form-control">
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-3 control-label">Username</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Masukkan Username" name="username" class="form-control">
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-3 control-label">Password</label>
        <div class="col-lg-7">
            <input type="password" placeholder="Masukkan Password" name="password" class="form-control">
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-3 control-label">Email</label>
        <div class="col-lg-7">
            <input type="email" placeholder="Masukkan Email" name="email" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label" for="exampleInputFile">Foto</label>
        <div class="col-lg-7">
            <input type="file" name="gambar" id="exampleInputFile">
        <p class="help-block">Format foto JPG, PNG dan JPEG.</br>Maks. 1MB</p>
        </div>
    </div>
        
    <div class="form-group well">
        <div class="col-lg-3 col-lg-offset-9">
            <a href="<?php echo site_url('admin/anggota');?>" class="btn btn-default">Kembali</a>
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
        </div>
    </div>
</form>
</div>