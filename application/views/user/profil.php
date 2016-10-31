<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>">Beranda</a></li>
    <li class="active">Profil</li>
  </ol>

  <div class="navbar-text navbar-right">
      <?php
                date_default_timezone_set("Asia/Jakarta");
                /* script menentukan hari */  
                 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                 $hr = $array_hr[date('N')];

                /* script menentukan tanggal */    
                $tgl= date('j');
                /* script menentukan bulan */ 
                  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                  $bln = $array_bln[date('n')];
                /* script menentukan tahun */ 
                $thn = date('Y');
                /* script perintah keluaran*/ 
                 echo $hr . ", " . $tgl . " " . $bln . " " . $thn . "  " . date('<b>h:i:s a</b>');
            ?> 
    </div>
			<div id="wrapper" class="well">
				<div class="page-header">
				  <h3><i class="glyphicon glyphicon-cog"></i>  Profil <small>Edit</small></h3>
				</div>
<div id="wrapper" class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Anda dapat mengubah data <b>Anggota</b> dan <b>Password</b>.
</div>
				<?php if (isset($err_password)) { ?>
				<div id="wrapper" class="alert alert-danger alert-dismissable">
					<?php echo $err_password; ?>
				</div>
				<?php } ?>

				<div class="row">
					<div class="col-md-6 col-md-offset-3" align="center">
						<?php foreach($profil as $row) { ?>
						<img id="wrapper" src="<?php echo base_url('assets/img/anggota/'.$row->fotoAgg);?>" height="100px" width="100px" class="img-circle"></br><h3><b><?php echo $row->namaAgg;?></b></h3>
					</div>
				</div>

				<div class="row">
					<div id="wrapper" class="panel panel-default" style="margin-top:3%">
					  <div class="panel-body">
					    <div class="tabbable" id="tabs-888597">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-450812" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>  Profil</a></a>
					</li>
					<li>
						<a href="#panel-270598" data-toggle="tab"><i class="glyphicon glyphicon-edit"></i>  Ubah Password</a></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-450812">
						<form class="form-horizontal" action="" method="post" style="margin-top:5%">
		                  
		                  <div class="form-group" style="margin-bottom:3%">
		                      <label class="col-lg-3 control-label">Karang Taruna</label>
		                      <div class="col-lg-8">
		                          <input readonly="readonly" type="varchar" value="<?php echo $row->namaKt; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">Nama</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="namaAgg" value="<?php echo $row->namaAgg; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">No. HP</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="hpAgg" value="<?php echo $row->hpAgg; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">Alamat</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="alamatAgg" value="<?php echo $row->alamatAgg; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">Pekerjaan</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="pekerjaanAgg" value="<?php echo $row->pekerjaanAgg; ?>" class="form-control">
		                      </div>
		                  </div>
	
                            <div class="form-group well">
                            <div class="col-lg-4 col-lg-offset-8">
                                <a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
                                <button class="btn btn-primary" id="simpan" name="simpan-profil" value="simpan"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                            </div>
                        </div>
                		</form>
					</div>
					<div class="tab-pane" id="panel-270598">
						<form class="form-horizontal" action="" method="post" style="margin-top:5%">   
                            <div class="form-group" style="margin-top:3%">
		                      <label class="col-lg-3 control-label">Username</label>
		                      <div class="col-lg-8">
		                          <input readonly="readonly" type="varchar" value="<?php echo $row->username; ?>" class="form-control">
		                      </div>
		                  </div>
                            
		                  <div class="form-group" style="margin-bottom:5%">
		                      <label class="col-lg-3 control-label">Password Lama</label>
		                      <div class="col-lg-8">
		                          <input name="plama" placeholder="Masukkan password lama" type="password" class="form-control">
		                      </div>
		                  </div>
		                  
		                  <div class="form-group">
		                      <label class="col-lg-3 control-label">Password Baru</label>
		                      <div class="col-lg-8">
		                          <input name="pbaru" placeholder="Masukkan password baru" type="password" class="form-control">
		                      </div>
		                  </div>

		                  <div class="form-group">
		                      <label class="col-lg-3 control-label">Ulangi Password</label>
		                      <div class="col-lg-8">
		                          <input name="pconf" Placeholder="Ulangi password baru" type="password" class="form-control">
		                      </div>
		                  </div>
		                  <div class="form-group well">
                            <div class="col-lg-4 col-lg-offset-8">
                                <a href="<?php echo site_url('dashboard');?>" class="btn btn-default">Kembali</a>
                                <button id="simpan" class="btn btn-primary" name="simpan-password" value="simpan"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                            </div>
                        </div>
                        <?php }?>
                		</form>
					</div>
				</div>
			</div>
					  </div>
					</div>
				</div>
			</div>