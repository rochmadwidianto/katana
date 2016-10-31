<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li><a href="<?php echo ('anggota');?>"><i class="glyphicon glyphicon-user"></i>  Anggota</a></li>
    <li class="active"><i class="glyphicon glyphicon-user"></i>  Detail Anggota</li>
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
				  <h3><i class="glyphicon glyphicon-user"></i>  Detail Anggota <small>Karang Taruna</small></h3>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3" align="center">
                        <img id="wrapper" src="<?php echo base_url('assets/img/anggota/'.$anggota['fotoAgg']);?>" height="150px" width="150px" class="img-circle"></br><h3><b><?php echo $anggota['namaAgg'];?></b></h3>
                        
					</div>
				</div>

				<div class="row">
					<div id="wrapper" class="panel panel-default" style="margin-top:3%">
					  <div class="panel-body">
					    <div class="row">
					    	<div class="col-md-4">
					    		<ul class="list-group">
								  <li class="list-group-item"><b>Nama</b></li>
								  <li class="list-group-item"><b>Jenis Kelamin</b></li>
                                    <li class="list-group-item"><b>Agama</b></li>
								  <li class="list-group-item"><b>Tanggal Lahir</b></li>
								  <li class="list-group-item"><b>Alamat</b></li>
								  <li class="list-group-item"><b>No. HP</b></li>
								  <li class="list-group-item"><b>Status</b></li>
								  <li class="list-group-item"><b>Pekerjaan</b></li>
								</ul>
					    	</div>
							<?php $agama = array(
								'-',
								'Islam',
								'Kristen',
								'Katolik',
								'Hindu',
								'Budha'
							); ?>
					    	<div class="col-md-8">
					    		<ul class="list-group">
								  <li class="list-group-item"><?php echo $anggota['namaAgg'];?></li>
								  <li class="list-group-item"><?php echo $anggota['jk'] == '1' ? 'Laki laki' : 'Perempuan';?></li>
                                    <li class="list-group-item"><?php echo $agama[$anggota['agamaAgg']];?></li>
								  <li class="list-group-item"><?php echo tgl_indo($anggota['ttlAgg']);?></li>
								  <li class="list-group-item"><?php echo $anggota['alamatAgg'];?></li>
								  <li class="list-group-item"><?php echo $anggota['hpAgg'];?></li>
								  <li class="list-group-item"><?php echo $anggota['statusAgg'] == '1' ? 'Belum Menikah' : 'Menikah';?></li>
								  <li class="list-group-item"><?php echo $anggota['pekerjaanAgg'];?></li>
								</ul>
					    	</div>
					    </div>
					  </div>
					</div>
					<font color="red" size="2">*) Gunakan data identitas anggota ini
					   dengan penuh tanggung jawab.</font>
				</div>
			</div>