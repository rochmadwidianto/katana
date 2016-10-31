  <ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-phone-alt"></i> Kontak Kami</li>
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
          <h3><i class="glyphicon glyphicon-phone-alt"></i>  Kontak Kami</h3>
        </div>

        <div class="row">
          <div id="wrapper" class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
 <div class="row">
		<div class="col-md-12" style="margin-left: 0px">
		  <div class="col-md-6">
			<legend>Kontak</legend>
			<ul>
                <p align="center"><b>ADMIN</b></br><i>Sistem Informasi Kegiatan Karang Taruna</i> - 
                  <b>KATANA</b></br>Karangkundi RT 03 RW 04, Kapungan, Polanharjo, Klaten.</br>INDONESIA</br>
                  Kode Pos : 57474</br><a href="widiantorochmad@gmail.com">widiantorochmad@gmail.com</a></br>
                  <b>085725655554</b></p>
			</ul>
		  </div>

		  <div class="col-md-6">
		  <legend style="margin-bottom: 10px">Tinggalkan pesan Anda disini</legend>
			<?php echo $this->session->flashdata("k");?>
			<?php foreach($profil as $row) { ?>
			<form method="post" id="f_bukutamu" class="form-horizontal" action="<?php echo site_url('dashboard/bukutamu/simpan');?>">
			<div class="form-group">
                <label class="col-lg-3 control-label" for="exampleInputFile">Nama</label>
                <div class="col-lg-9">
                    <input type="varchar" readonly="readonly" placeholder="Masukkan nama Anda" name="nama" value="<?php echo $row->namaAgg; ?>" class="form-control" required>
                </div>
            </div>
                <div class="form-group">
                <label class="col-lg-3 control-label" for="exampleInputFile">Email</label>
                <div class="col-lg-9">
                    <input type="varchar" readonly="readonly" placeholder="Masukkan email Anda" name="email"  value="<?php echo $row->email; ?>" class="form-control" required>
                </div>
            </div>
                <div class="form-group">
                <label class="col-lg-3 control-label" for="exampleInputFile">Pesan</label>
                <div class="col-lg-9">
                    <input type="text" placeholder="Masukkan pesan Anda" name="pesan" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-3 col-lg-offset-9">
                    <input type="submit" value="Kirim" id="tombol" class="btn btn-md btn-primary">
                </div>
            </div>
                
<!--
                <table border="0" width="100%">
				<tr><td width="15%">Nama</td><td><input type="text" name="nama" class="form-control" required></td></tr>
				<tr><td>Email</td><td><input type="email" name="email"  class="form-control" required></td></tr>
				<tr><td>Pesan</td><td><input type="text" name="pesan" class="form-control" required></td></tr>
				<tr><td></td><td><input type="submit" value="Kirim" id="tombol" class="btn btn-primary"></td></tr>
			</table>
-->
			</form>
			<?php }?>
			</div>
		</div>
		<!--
		<div class="span12 wellwhite" style="margin-left: 0px">
		  <legend style="margin-bottom: 10px">Daftar</legend>		
		  <?php
			$i = 1;
			foreach ($buku_tamu as $d) {
			if ($i % 2 == 0) { $b = "style='background: #efefef'"; } else { $b = ""; }
			?>
			<table border="0" width="90%" <?=$b?>>
				<tr><td width="30%">Nama</td><td>: <?=$d->nama?></td></tr>
				<tr><td>Email</td><td>: <?=$d->email?></td></tr>
				<tr><td>Pesan</td><td>: <?=$d->pesan?></td></tr>
				<tr><td>Tanggal</td><td>: <?=$d->tgl?></td></tr>
				<tr><td></td><td align="right"><a href="<?=base_URL()?>index.php/tampil/bukutamu/edit/<?=$d->id?>">Edit</a> | 
				<a href="<?=base_URL()?>index.php/tampil/bukutamu/hapus/<?=$d->id?>" onclick="return confirm('Anda yakin ingin menghapus pesan dari <?=$d->nama?> ..?');">Hapus</a></td></tr>
			</table>
			<?php 
			$i++;
			}
			?>			
        </div> <!-- /col-left -->



        
            </div>
          </div>
        </div>
      </div>
</div>