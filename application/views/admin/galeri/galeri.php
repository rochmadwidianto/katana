<div class="page-header">
      <h3><i class="glyphicon glyphicon-picture"></i>  Galeri <small>Gambar & Foto</small></h3>
    </div>

<div class="row">
    <div class="col-md-12">
    <div class="panel panel-group">
                            <div class="panel panel-default" style="margin-top:-1%; margin-bottom:-1%">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus">
                                        </span>  Tambah <small>Gambar / Foto</small></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
<div id="wrapper" class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Anda dapat menambahkan gambar dengan mengisi <i>form</i> dibawah ini dengan lengkap.
</div>
<div id="wrapper" class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <b>PERINGATAN!</b></br>Dilarang meng-<i>upload</i> gambar yang bersifat <b>SARA, Porno, Menyinggung, Mengejek, Melecehkan</b> dan <b>Merendahkan</b> pihak lain.
</div>
     <form action="<?php echo site_url('admin/tambah_gambar');?>" method="post" enctype="multipart/form-data">
       <table class="table table-striped">
         <tr>
             <td style="width:15%;"><b>File Gambar</b></td>
          <td>
            <div class="col-sm-6">
                <input type="file" name="filefoto" class="form-control">
                <p class="help-block">Format foto JPG, PNG dan JPEG.</br>Maks. 2MB</p>
            </div>
            </td>
         </tr>
         <tr>
             <td style="width:15%;"><b>Keterangan Gambar</b></td>
          <td>
            <div class="col-sm-10">
                <textarea name="textket" placeholder="Masukkan Judul Gambar" class="form-control"></textarea>
            </div>
            </td>
         </tr>
         <tr>
          <td colspan="2" align="right">
              <button type="reset" class="btn btn-default">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </td>
         </tr>
       </table>
     </form>
                                    </div>
                                </div>
                            </div>
    </div>
    </div>
</div>

          <div class="panel panel-default" style="margin-top:1%">
            <div class="panel-body">
              <?php if (count($query) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
                <div id="gallery">
                    <?php echo $this->session->flashdata('pesan');?>
                  <ul>
                    
                    <?php $no=0; foreach($query as $rowdata ): $no++;?>
                    <li> 
                      <div class="well well-sm">
                      <a href="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" title="<?php echo $rowdata->ket_gbr;?>">
                        <img src="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" height="150px" width="150px"  alt="KATANA">
                      </a><br/>
                        <button class="btn btn-sm btn-primary" style="margin-top:2%; margin-right:12%;" onclick="download(<?php echo $rowdata->id; ?>)"><i class="glyphicon glyphicon-download"></i> Download</button>
                        <button class="btn btn-sm btn-danger" style="margin-top:2%;"  rel="tooltip" title="Hapus" onclick="hapus(<?php echo $rowdata->id; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                      </div>
                    </li>
                        <?php endforeach;?>
                      
                  </ul>
                </div>
            </div>
          </div>

<script>
    function hapus(id) {
        window.location = '<?php echo site_url('admin/hapus_galeri'); ?>/' + id;
    }

    function download(id) {
        window.location = '<?php echo site_url('admin/download_galeri'); ?>/' + id;
    }
</script>