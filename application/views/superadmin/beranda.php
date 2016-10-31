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
            
            <a id="modal-566794<?php echo $list['id_berita']; ?>" href="#modal-container-566794<?php echo $list['id_berita']; ?>" data-toggle="modal"> <h4><b><?php echo $list['judul']; ?></a></b></h4>
            <small><i><b>Diposting oleh :</b>  <?php echo $list['namaKt']; ?>  <b>pada</b> <?php echo $list['tanggal']; ?> </i></small></br>

										<!-- MODAL ini -->
										<div class="modal fade" id="modal-container-566794<?php echo $list['id_berita']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
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
            <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> DATA ANGGOTA</div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-6" align="center">
                          <font color="grey"> Hide</font>
                  <p align="center"><font color="grey" size="40"><b><?php echo $jmlanggotaHide;?></b></font></p>
                      </div>
                      <div class="col-md-6" align="center">
                          <font color="grey"> Show</font>
                  <p align="center"><font size="40"><b><?php echo $jmlanggotaShow;?></b></font></p>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> DATA KEGIATAN</div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-6" align="center">
                          <font color="grey"> Hide</font>
                  <p align="center"><font color="grey" size="40"><b><?php echo $jmlkegiatanHide;?></b></font></p>
                      </div>
                      <div class="col-md-6" align="center">
                          <font color="grey"> Show</font>
                  <p align="center"><font size="40"><b><?php echo $jmlkegiatanShow;?></b></font></p>
                      </div>
                  </div>
                
              </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
              <div class="panel-heading"><i class="glyphicon glyphicon-picture"></i> DATA GALERI</div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-6" align="center">
                          <font color="grey"> Hide</font>
                  <p align="center"><font color="grey" size="40"><b><?php echo $jmlgambarHide;?></b></font></p>
                      </div>
                      <div class="col-md-6" align="center">
                          <font color="grey"> Show</font>
                  <p align="center"><font size="40"><b><?php echo $jmlgambarShow;?></b></font></p>
                      </div>
                  </div>
                
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="wrapper" class="panel panel-info">
                <div class="panel-heading"><i class="glyphicon glyphicon-bullhorn"></i> DATA BERITA</div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-6" align="center">
                          <font color="grey"> Hide</font>
                  <p align="center"><font color="grey" size="40"><b><?php echo $jmlberitaHide;?></b></font></p>
                      </div>
                      <div class="col-md-6" align="center">
                          <font color="grey"> Show</font>
                  <p align="center"><font size="40"><b><?php echo $jmlberitaShow;?></b></font></p>
                      </div>
                  </div>
                
              </div>
            </div>
        </div>
        </div>
            </div>
        </div>
    </div>
</div>