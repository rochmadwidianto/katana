<div class="page-header">
      <h3><i class="glyphicon glyphicon-bullhorn"></i>  Berita <small>Karang Taruna</small></h3>
    </div>
<div class="col-md-12 column">
			<div class="tabbable" id="tabs-123741">
				<div class="tab-content">
					<div class="tab-pane active" id="panel-46291">

        <div class="row">
            <div class="col-md-7">
						<!-- ini -->
				<a id="modal-566789" href="#modal-container-566789" role="button" class="btn btn-success tambah_berita" data-toggle="modal">Tambah Berita
					<span class="glyphicon glyphicon-plus"></a></button></a>
                    </div>
                <div class="col-md-5">
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('admin/cariBerita/'.$kt);?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan judul berita">
                            </div>
                      <button type="submit" href="<?php echo site_url('admin/cariBerita');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
    </div>
										<!-- MODAL ini -->
					<div class="modal fade" id="modal-container-566789" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel">
									<i class="glyphicon glyphicon-plus"></i>  Tambah Berita :
								</h4>
							</div>

								<div class="modal-body">
                                     <div id="wrapper" class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Anda dapat menambahkan berita dengan mengisi <i>form</i> dibawah ini dengan lengkap.</br> Gunakan bahasa yang <b>baku, mudah dimengerti </b>dan <b>jelas!</b> 
            </div>
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
                                 <textarea type="text" class="form-control big" rows="5" placeholder="Masukkan Ringkasan Berita" name="ringkasan"  /></textarea>
                                 </div>
															</div>

															<div class="form-group">
																 <label class="col-lg-2 control-label" for="exampleInputNama1">Isi</label>
																 <div class="col-lg-10">
                                 <textarea type="text" class="form-control big" placeholder="Masukkan Isi Berita" rows="5" name="isi"  /></textarea>
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
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</form>
												</div>
												
											</div>
											
										</div>
									</div>
									<?php if (count($informatika->result()) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
        <?php echo $this->session->flashdata('pesan');?>
                <table class="table table-hover">
        <thead>
        <tr>
            <td align="center"><b>TANGGAL</b></td>
            <td align="center"><b>JUDUL BERITA</b></td>
            <td align="center"><b>ISI BERITA</b></td>
            <td colspan="2" align="center"></td>
        </tr>
    </thead>
        <?php foreach ($informatika->result() as $row) { ?>
    <tr>
        <td><?php echo tgl_indo($row->tanggal); ?></td>
        <td><b><?php echo ($row->judul); ?></b></td>   
        <td><?php echo ($row->isi); ?></td>
        
        <td><a href="<?php echo site_url('admin/edit_berita/'.$row->id_berita);?>" rel="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="<?php echo site_url('admin/hapusBerita/'.$row->id_berita);?>"  rel="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
            <?php }	?>
</Table>
    </table>
					<!-- end -->
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>