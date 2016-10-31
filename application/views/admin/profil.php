<div class="well">
				<div class="page-header">
				  <h3><i class="glyphicon glyphicon-cog"></i>  Profil <small>Edit</small></h3>
				</div>
    <div id="wrapper" class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Anda dapat mengubah data <b>Admin, Password </b>dan <b>Karang Taruna</b>.
</div>
		<?php if (isset($err_password)) { ?>
				<div id="wrapper" class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $err_password; ?>
				</div>
				<?php } ?>
				<div class="row">
					<div class="panel panel-default">
					  <div class="panel-body">
					    <div class="tabbable" id="tabs-888597">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-450812" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>  Profil</a></a>
					</li>
					<li>
						<a href="#panel-270598" data-toggle="tab"><i class="glyphicon glyphicon-edit"></i>  Ubah Password</a></a>
					</li>
                    <li>
						<a href="#panel-270599" data-toggle="tab"><i class="glyphicon glyphicon-th-large"></i>  Karang Taruna</a></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-450812">
						<form class="form-horizontal" action="" method="post" style="margin-top:3%">
							<?php foreach($profil as $row) { ?>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">Nama</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="namaAd" value="<?php echo $row->namaAd; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">No. HP</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="hpAd" value="<?php echo $row->hpAd; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group">
		                      <label class="col-lg-3 control-label">Alamat</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="alamatAd" value="<?php echo $row->alamatAd; ?>" class="form-control">
		                      </div>
		                  </div>
                            <div class="form-group" style="margin-bottom:3%">
		                      <label class="col-lg-3 control-label">Pekerjaan</label>
		                      <div class="col-lg-8">
		                          <input type="varchar" name="pekerjaanAd" value="<?php echo $row->pekerjaanAd; ?>" class="form-control">
		                      </div>
		                  </div>
		   					
                            <div class="form-group well">
                            <div class="col-lg-3 col-lg-offset-9">
                                <a href="<?php echo site_url('admin');?>" class="btn btn-default">Kembali</a>
                                <button id="simpan" class="btn btn-primary" name="simpan-profil" value="simpan"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                            </div>
                        </div>
                		</form>
					</div>
					<div class="tab-pane" id="panel-270598">
						<form class="form-horizontal" action="" method="post" style="margin-top:5%">
                        <div class="form-group" style="margin-top:3%">
		                      <label class="col-lg-3 control-label">Username</label>
		                      <div class="col-lg-8">
		                          <input readonly="readonly" value="<?php echo $row->username; ?>" type="varchar" class="form-control">
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
		                          <input name="pconf" placeholder="Ulangi password baru" type="password" class="form-control">
		                      </div>
		                  </div>
		                  <div class="form-group well">
                            <div class="col-lg-3 col-lg-offset-9">
                                <a href="<?php echo site_url('admin');?>" class="btn btn-default">Kembali</a>
                                <button id="simpan" class="btn btn-primary" name="simpan-password" value="simpan"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                            </div>
                        </div>
                		</form>
					</div>
                    <div class="tab-pane" id="panel-270599">
						<form class="form-horizontal" action="" method="post" style="margin-top:3%">
		                  <div class="form-group">
		                      <label class="col-lg-3 control-label">Nama</label>
		                      <div class="col-lg-8">
		                          <input name="namaKt" type="varchar" value="<?php echo $row->namaKt; ?>" class="form-control">
		                      </div>
		                  </div>
		                  
		                  <div class="form-group">
		                      <label class="col-lg-3 control-label">Alamat</label>
		                      <div class="col-lg-8">
		                          <input name="alamatKt" type="varchar" value="<?php echo $row->alamatKt; ?>" class="form-control">
		                      </div>
		                  </div>

		                  <div class="form-group" style="margin-bottom:3%">
		                      <label class="col-lg-3 control-label">Tentang</label>
		                      <div class="col-lg-8">
		                          <input name="tentangKt" type="varchar" value="<?php echo $row->tentangKt; ?>" class="form-control">
		                      </div>
		                  </div>
		                  <div class="form-group well">
                            <div class="col-lg-3 col-lg-offset-9">
                                <a href="<?php echo site_url('admin');?>" class="btn btn-default">Kembali</a>
                                <button id="simpan" class="btn btn-primary" name="simpan-katana" value="simpan"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
                            </div>
                        </div>
                        <?php } ?>
                		</form>
					</div>
				</div>
			</div>
					  </div>
					</div>
				</div>
			</div>