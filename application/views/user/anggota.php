  <ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-user"></i> Anggota</li>
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
          <h3><i class="glyphicon glyphicon-user"></i>  Data <small>Anggota</small></h3>
        </div>

        <div class="row">
          <div class="col-md-12 ">
            <div class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('dashboard/cariAgg/'.$kt);?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama anggota">
                            </div>
                      <button type="submit" href="<?php echo site_url('dashboard/cariAgg');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div id="wrapper" class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
              <?php if (count($anggota) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
              <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center"><b>NO</b></td>
                        <td align="center"><b>FOTO</b></td>
                        <td align="center"><b>NAMA ANGGOTA</b></td>
                        <td align="center"><b>ALAMAT</b></td>
                        <td align="center"><b>NO HP</b></td>
                    </tr>
                </thead>
                  <?php $no=0; foreach($anggota as $row ): $no++;?>
                <tr>
                    <td align="center"><?php echo $no;?></td>
                    <td align="center"><img src="<?php echo base_url('assets/img/anggota/'.$row->fotoAgg);?>" height="50px" width="50px" class="img-circle"></td>
                    <td align="center"><b><?php echo $row->namaAgg;?></b></td>
                    <td align="center"><?php echo $row->alamatAgg;?></td>
                    <td align="center"><?php echo $row->hpAgg;?></td>
                    
                    <td align="center"><a href="<?php echo site_url('dashboard/detail_anggota/'.$row->idAgg);?>" rel="tooltip" title="Tampilkan detail data anggota"><i class="glyphicon glyphicon-folder-open"></i></a></td>
                </tr>
                <?php endforeach;?>
            </Table>
                
              </table>
            </div>
          </div>
        </div>
      </div>