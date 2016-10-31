<div id="wrapper" class="well" >
      <div class="tabbable" id="tabs-888597">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#panel-450812" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i>  Kegiatan</a></a>
          </li>
          <li>
            <a href="#panel-270598" data-toggle="tab"><i class="glyphicon glyphicon-picture"></i>  Galeri</a></a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="panel-450812">
              <?php echo validation_errors();?>
            <form class="form-horizontal" action="<?php echo site_url('dashboard/proses_tambah');?>" method="post" style="margin-top:5%">
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
                              <a href="#" class="btn btn-default">Batal</a>
                              <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                          </div>
                      </div>
                    </form>
          </div>
          <div class="tab-pane" id="panel-270598">
                <fieldset>
                    <?php echo $this->session->flashdata('pesan')?>
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
              <button type="reset" class="btn btn-default">Batal</button>
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
      <div id="wrapper" class="well" style="margin-top:-2%">
        <div class="page-header">
          <h2>
            Ringkasan <small>Berita</small>
          </h2>
        </div>
        <div class="konten">
          <?php if (count($berita) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
      <div class="posting">
        
        <?php foreach($berita as $list) { ?>
        <div class="ringkasan">
            <h4><a href="<?php echo site_url('dashboard/read'); ?>/<?php echo $list['id_berita']; ?>"><?php echo $list['judul']; ?></a></h4>
            <small><i><b>Diposting oleh :</b>  <?php echo $list['namaKt']; ?>  <b>pada</b> <?php echo $list['tanggal']; ?> </i></small></br>
          <?php echo $list['ringkasan']; ?>
        </div>
<?php } ?> 

      </div>
    </div>
    </div>