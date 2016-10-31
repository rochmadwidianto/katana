<div class="col-md-6">
    <div id="wrapper" class="well">
        <div class="page-header">
          <h3>
            Ringkasan <small>Berita</small>
          </h3>
        </div>
        <div class="konten">
          <?php if (count($berita) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
      <div class="posting">
        
        <?php foreach($berita as $list) { ?>
        <div class="ringkasan">
            
            <a id="modal-566793<?php echo $list['id_berita']; ?>" href="#modal-container-566793<?php echo $list['id_berita']; ?>" data-toggle="modal"> <h4><b><?php echo $list['judul']; ?></b></a></h4>
            <small><i><b>Diposting oleh :</b>  <?php echo $list['namaKt']; ?>  <b>pada</b> <?php echo $list['tanggal']; ?> </i></small></br>

										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566793<?php echo $list['id_berita']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">
															<?php echo $list['judul']; ?>
														</h4>
													</div>

													<div class="modal-body">
														<?php echo $list['isi']; ?>
												    </div>
                                                    
                               <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
                                </div>
											</div>
										</div>
    </div>
          <?php echo $list['ringkasan']; ?>
        </div>
<?php } ?> 

      </div>
      
    </div>
    </div>
</div>
<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">
            <div id="wrapper" class="panel panel-default">
                <div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> TAMBAH DATA</div>
              <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div id="wrapper" class="well" align="center">
                            <i class="glyphicon glyphicon-user"></i></br>
                            <a id="modal-566792" href="#modal-container-566792" data-toggle="modal"> Anggota</a>

										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566792" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">
															<i class="glyphicon glyphicon-plus"></i>  Tambah Anggota :
														</h4>
													</div>

													<div class="modal-body">
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
            <?php  echo form_dropdown('agamaAgg',array('1'=>'ISLAM','2'=>'KRISTEN','3'=>'KATHOLIK','4'=>'HINDU','5'=>'BUDHA'),'',"class='form-control'");?>
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
            <input type="text" placeholder="Masukkan Email" name="email" class="form-control">
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
        <div class="col-lg-5 col-lg-offset-7">
            <a href="<?php echo site_url('admin/anggota');?>" class="btn btn-default">Kembali</a>
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
        </div>
    </div>
</form>
						</div>
											</div>
						</div>
    </div>
              </div>
                    </div>
                    <div class="col-md-3">
                        <div id="wrapper" class="well" align="center">
                            <i class="glyphicon glyphicon-list-alt"></i></br>
                            <a id="modal-566789" href="#modal-container-566789" data-toggle="modal">Kegiatan</a>

										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566789" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">
															<i class="glyphicon glyphicon-plus"></i>  Tambah Kegiatan :
														</h4>
													</div>

													<div class="modal-body">
														<?php echo validation_errors();?>
            <form class="form-horizontal" action="<?php echo site_url('admin/proses_tambah');?>" method="post" style="margin-top:2%">
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Nama Kegiatan</label>
                          <div class="col-lg-8">
                              <input placeholder="Masukkan nama kegiatan" type="varchar" name="namaKeg" class="form-control">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Deskripsi</label>
                          <div class="col-lg-8">
                              <textarea placeholder="Masukkan deskripsi, lokasi, dll" type="input"class="form-control" name="deskripsiKeg" rows="3"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-3 control-label">Tanggal</label>
                          <div class="col-lg-8">
                              <input type="date" name="tanggalKeg" id="tanggal" class="form-control">
                          </div>
                      </div>
                      <div class="form-group well">
                          <div class="col-lg-5 col-lg-offset-7">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                          </div>
                      </div>
                    </form>
												</div>
											</div>
										</div>
    </div>
              </div>
                    </div>
                    <div class="col-md-3">
                        <div id="wrapper" class="well" align="center">
                            <i class="glyphicon glyphicon-picture"></i></br>
                            <a id="modal-566790" href="#modal-container-566790" data-toggle="modal"> Gambar</a>
										
										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566790" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">
															<i class="glyphicon glyphicon-plus"></i>  Tambah Gambar :
														</h4>
													</div>

													<div class="modal-body">
                <fieldset>
     <form action="<?php echo site_url('admin/tambah_gambar');?>" method="post" enctype="multipart/form-data">
       <table class="table table-striped">
         <tr>
             <td style="width:15%;"><b>File Gambar</b></td>
          <td>
            <div class="col-sm-12">
                <input type="file" name="filefoto" class="form-control">
                <p class="help-block">Format foto JPG, PNG dan JPEG.</br>Maks. 2MB</p>
            </div>
            </td>
         </tr>
         <tr>
             <td style="width:15%;"><b>Keterangan Gambar</b></td>
          <td>
            <div class="col-sm-12">
                <textarea name="textket" placeholder="Masukkan Judul Gambar" class="form-control"></textarea>
            </div>
            </td>
         </tr>
         <tr>
          <td align="right" colspan="2">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </td>
         </tr>
       </table>
     </form>
                </fieldset>
												</div>
											</div>
										</div>
    </div>
              </div>
                    </div>
                    <div class="col-md-3">
                        <div id="wrapper" class="well" align="center">
                            <i class="glyphicon glyphicon-bullhorn"></i></br>
                            <a id="modal-566791" href="#modal-container-566791" data-toggle="modal"> Berita</a>
										
										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566791" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h4 class="modal-title" id="myModalLabel">
															<i class="glyphicon glyphicon-plus"></i>  Tambah Berita :
														</h4>
													</div>

													<div class="modal-body">
                            <form class="form-horizontal" action="<?php echo site_url('admin/tambah_berita');?>" method="post" style="margin-top:5%">
                                                                
															<div class="form-group">
																 <label class="col-lg-2 control-label" for="exampleInputNama1">Judul</label>
                                 <div class="col-lg-10">
																 <input type="text" placeholder="Masukkan Judul Berita" class="form-control " name="judul"  />
                                </div>
															</div>

															
                                                            
                              <div class="form-group">
																 <label class="col-lg-2 control-label" for="exampleInputNama1">Ringkasan</label>
																 <div class="col-lg-10">
                                 <textarea type="text" placeholder="Masukkan Ringkasan Berita" class="form-control big" rows="5" name="ringkasan"  /></textarea>
                                 </div>
															</div>

															<div class="form-group">
																 <label class="col-lg-2 control-label" for="exampleInputNama1">Isi</label>
																 <div class="col-lg-10">
                                 <textarea type="text" placeholder="Masukkan Isi Berita" class="form-control big" rows="5" name="isi"  /></textarea>
                                 </div>
															</div>
															
															<div class="form-group">
																<label class="col-lg-2 control-label" for="exampleInputComment1">Tanggal</label>
																<div class="col-lg-10">
                                <input type="date" class="form-control"  name="tanggal" /></textarea>
                                </div>
															</div>
														
																
													</div>
													<div class="modal-footer">
														 <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> 
														<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
													</div>
												</form>
												</div>
												
											</div>
											
										</div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> DATA ANGGOTA</div>
              <div class="panel-body">
                  <p align="center"><font size="40"><b><?php echo $jmlanggota;?></b></font></p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> DATA KEGIATAN</div>
              <div class="panel-body">
                <p align="center"><font size="40"><b><?php echo $jmlkegiatan;?></b></font></p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-picture"></i> DATA GALERI</div>
              <div class="panel-body">
                <p align="center"><font size="40"><b><?php echo $jmlGambar;?></b></font></p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
                <div class="panel-heading"><i class="glyphicon glyphicon-bullhorn"></i> DATA BERITA</div>
              <div class="panel-body">
                <p align="center"><font size="40"><b><?php echo $jmlBerita;?></b></font></p>
              </div>
            </div>
        </div>
    </div>
</div>