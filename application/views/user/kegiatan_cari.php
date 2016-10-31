<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li><a href="<?php echo ('kegiatan');?>"><i class="glyphicon glyphicon-list-alt"></i>  Kegiatan</a></li>
    <li class="active"><i class="glyphicon glyphicon-search"></i>  Pencarian Kegiatan</li>
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
          <h3><i class="glyphicon glyphicon-search"></i>  Hasil Pencarian <small>Kegiatan</small></h3>
        </div>

        <div class="row">
          <div id="wrapper" class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
              <?php if (count($hasil) == 0){ ?>
                <div class="alert alert-danger">Data tidak ditemukan</div>
                <?php } ?>
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
        <?php $no=0; foreach($hasil as $row ): $no++;?>
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