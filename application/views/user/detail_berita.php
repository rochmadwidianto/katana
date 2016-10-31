<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-bullhorn"></i>  Detail Berita</li>
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
          <h1>
              <i class="glyphicon glyphicon-bullhorn"></i>  Berita <small>Karang Taruna</small>
          </h1>
        </div>
        <div class="konten">
          <div class="posting">
          <h3><?php echo $detail['judul'] ?></h3>
              <small><i><b>Diposting oleh :</b>  <?php echo $detail['namaKt']; ?>  <b>pada</b> <?php echo $detail['tanggal']; ?> </i></small>
            <div class="ringkasan" style="margin-top:5%"><?php echo $detail['isi'] ?></div>

            </div>

        </div>
    </div>