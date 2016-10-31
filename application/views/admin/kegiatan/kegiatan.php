<div class="page-header">
      <h3><i class="glyphicon glyphicon-list-alt"></i>  Data Kegiatan <small>Karang Taruna</small></h3>
    </div>
<div class="row" style="margin-bottom:2%">
    <div class="col-md-5 col-md-offset-7">
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('admin/cariKeg/'.$kt);?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama kegiatan">
                            </div>
                      <button type="submit" href="<?php echo site_url('admin/cariKeg');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-group">
                            <div class="panel panel-default" style="margin-top:-1%; margin-bottom:-1%">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus">
                                        </span>  Tambah <small>Kegiatan</small></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div id="wrapper" class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Anda dapat menambahkan kegiatan dengan mengisi <i>form</i> dibawah ini dengan lengkap.</br> Gunakan bahasa yang <b>baku, mudah dimengerti </b>dan <b>jelas!</b> 
            </div>
                                        <?php echo validation_errors();?>
            <form class="form-horizontal" action="<?php echo site_url('admin/proses_tambah');?>" method="post" style="margin-top:2%">
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Nama Kegiatan</label>
                          <div class="col-lg-8">
                              <input placeholder="Masukkan Nama Kegiatan" type="varchar" name="namaKeg" class="form-control">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Deskripsi</label>
                          <div class="col-lg-8">
                              <textarea placeholder="Masukkan deskripsi, lokasi, dll" type="input" name="deskripsiKeg" class="form-control" rows="3"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-3 control-label">Tanggal</label>
                          <div class="col-lg-8">
                              <input type="date" name="tanggalKeg" class="form-control">
                          </div>
                      </div>                  
                        
                      <div class="form-group well">
                          <div class="col-lg-3 col-lg-offset-9">
                              <a href="<?php echo site_url('admin/kegiatan');?>" class="btn btn-default">Batal</a>
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
            <td colspan="2"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($kegiatan as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        
        <td align="center"><b><?php echo $row->namaKeg;?></b></td>
        <td><?php echo $row->deskripsiKeg;?></td>
        <td align="center"><?php echo tgl_indo($row->tanggalKeg); ?></td>
        
        <td><a href="<?php echo site_url('admin/edit_kegiatan/'.$row->idKeg);?>" rel="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="<?php echo site_url('admin/hapusKeg/'.$row->idKeg);?>"  rel="tooltip" title="Hapus" class="hapus" kode="" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
    </table>
