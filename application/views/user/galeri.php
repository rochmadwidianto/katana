<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-picture"></i>  Galeri</li>
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
          <h3><i class="glyphicon glyphicon-picture"></i>  Galeri <small>Gambar & Foto</small></h3>
        </div>
<div class="row">
    <div class="col-md-7">
        <a id="modal-566789" href="#modal-container-566789" role="button" class="btn btn-success tambah_berita" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Gambar</button></a>
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
															<i class="glyphicon glyphicon-plus"></i>  Tambah Gambar :
														</h4>
													</div>

													<div class="modal-body">
                                                        <div id="wrapper" class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Anda dapat menambahkan gambar dengan mengisi <i>form</i> dibawah ini dengan lengkap.
</div>
<div id="wrapper" class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>PERINGATAN!</b></br>Dilarang meng-<i>upload</i> gambar yang bersifat <b>SARA, Porno, Menyinggung, Mengejek, Melecehkan</b> dan <b>Merendahkan</b> pihak lain.
</div>
                <fieldset>
     <form action="<?php echo site_url('dashboard/tambah_gambar');?>" method="post" enctype="multipart/form-data">
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
          <td colspan="2" align="right">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
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
        <div class="row">
            <div id="wrapper" class="panel-body">
              <?php if (count($galeri) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
                <div id="gallery">
                    <?php echo $this->session->flashdata('pesan');?>
                  <ul>
                    
                    <?php $no=0; foreach($galeri as $rowdata ): $no++;?>
                    <li> 
                      <div class="well well-sm">
                      <a href="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" title="<?php echo $rowdata->ket_gbr;?>">
                        <img src="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" height="127px" width="127px"  alt="KATANA">
                      </a><br/>
                        <button class="btn btn-sm btn-primary" style="margin-top:2%; margin-right:12%;" onclick="download(<?php echo $rowdata->id; ?>)"><i class="glyphicon glyphicon-download"></i> Download</button>
                      </div>
                    </li>
                        <?php endforeach;?>
                  </ul>
                </div>
            </div>
        </div>
</div>
<script>
    function download(id) {
        window.location = '<?php echo site_url('dashboard/download_galeri'); ?>/' + id;
    }
</script>