<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li><a href="<?php echo ('kegiatan');?>"><i class="glyphicon glyphicon-list-alt"></i>  Kegiatan</a></li>
    <li class="active"><i class="glyphicon glyphicon-edit"></i>  Edit Data Kegiatan</li>
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
          <h3><i class="glyphicon glyphicon-edit"></i>  Edit <small>Data Kegiatan</small></h3>
        </div>

        <div class="row" style="margin-bottom:2%">

                <?php echo $message;?>
<?php echo validation_errors();?>
                <form class="form-horizontal" action="" method="post" style="margin-top:5%">
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Nama Kegiatan</label>
                          <div class="col-lg-8">
                              <input value="<?php echo $kegiatan['namaKeg'];?>" type="varchar" name="namaKeg" class="form-control">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-lg-3 control-label">Deskripsi</label>
                          <div class="col-lg-8">
                              <textarea type="varchar" class="form-control" name="deskripsiKeg"><?php echo $kegiatan['deskripsiKeg'];?></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-3 control-label">Tanggal</label>
                          <div class="col-lg-8">
                              <input type="date" name="tanggalKeg" id="tanggal" class="form-control" value="<?php echo $kegiatan['tanggalKeg'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-4 col-lg-offset-8">
                              <a href="<?php echo site_url('dashboard/kegiatan');?>" class="btn btn-default">Batal</a>
                              <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                          </div>
                      </div>
                    </form>
    
</div>
</div>
<div class="well">
        <div class="row">
          <div class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
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
        <?php $no=0; foreach($tampil as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td align="center"><b><?php echo $row->namaKeg;?></b></td>
        <td><?php echo $row->deskripsiKeg;?></td>
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