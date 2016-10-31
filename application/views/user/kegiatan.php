<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-list-alt"></i>  Kegiatan</li>
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
          <h3><i class="glyphicon glyphicon-list-alt"></i>  Data <small>Kegiatan</small></h3>
        </div>

        <div class="row" style="margin-bottom:2%">
    <div class="col-md-7">
        <a id="modal-566789" href="#modal-container-566789" role="button" class="btn btn-success tambah_berita" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Kegiatan</button></a>
										<p>
										</p>
										<p></p>
										
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
                                                        <div id="wrapper" class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Anda dapat menambahkan kegiatan dengan mengisi <i>form</i> dibawah ini dengan lengkap.</br> Gunakan bahasa yang <b>baku, mudah dimengerti </b>dan <b>jelas!</b> 
            </div>
														<?php echo validation_errors();?>
            <form class="form-horizontal" action="<?php echo site_url('dashboard/proses_tambah');?>" method="post" style="margin-top:2%">
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
                      <div id="wrapper" class="form-group well">
                          <div class="col-lg-5 col-lg-offset-7">
                              <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                              <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                          </div>
                      </div>
                    </form>
												</div>
												
											</div>
											
										</div>
    </div>
            </div>
    <div class="col-md-5">
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('dashboard/cariKeg/'.$kt);?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama kegiatan">
                            </div>
                      <button type="submit" href="<?php echo site_url('dashboard/cariKeg');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
    </div>
    
</div>

        <div class="row">
          <div id="wrapper" class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
              <?php if (count($kegiatan) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
    <?php echo $this->session->flashdata('pesan');?>
    <table class="table table-striped">
        <thead>
        <tr>
            <td align="center"><b>NO</b></td>
            <td align="center"><b>NAMA KEGIATAN</b></td>
            <td align="center"><b>DESKRIPSI</b></td>
            <td align="center"><b>TANGGAL</b></td>
            <td colspan="1" align="center"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($kegiatan as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td align="center"><b><?php echo $row->namaKeg;?></b></td>
        <td align="center"><?php echo $row->deskripsiKeg;?></td>
        <td align="center"><?php echo tgl_indo($row->tanggalKeg); ?></td>
        <td><a href="<?php echo site_url('dashboard/edit_kegiatan/'.$row->idKeg);?>"  rel="tooltip" title="Edit data"><i class="glyphicon glyphicon-edit"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

    </table>
            </div>
          </div>
        </div>
      </div>