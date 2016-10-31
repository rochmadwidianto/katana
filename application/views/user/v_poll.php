  <ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-stats"></i> Hasil Polling</li>
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
          <h3><i class="glyphicon glyphicon-stats"></i>  Hasil Polling <small>KATANA</small></h3>
        </div>

        <div class="row">
          <div id="wrapper" class="panel panel-default" style="margin-top:3%">
            <div class="panel-body">
              <?php
			$hasil_poll	= $this->db->query("SELECT * FROM poll ORDER BY id DESC")->result();
			foreach ($hasil_poll as $polling) {
			?>
			<h4><?=$polling->tanya?></h4>						
			<?php
			$jumlah_vote = $polling->j_1 + $polling->j_2 + $polling->j_3 + $polling->j_4;
			?>
			
			<div style="width: 500px; border-bottom: solid 1px; border-left: solid 1px #AFB0B4; padding: 40px 0 25px 5px">
				<div style="overflow: visible; color: #fff; padding: 10px 5px 10px 5px; margin-bottom: 10px;  overflow: hidden; background: blue; border: solid 1px #AFB0B4; width: <?=(($polling->j_1/$jumlah_vote)*100)?>%; font-size: <?=(($polling->j_1/$jumlah_vote)*400)?>%; height: 50px" title="<?=$polling->op_1." (".$polling->j_1.")"?>">
				<?=$polling->op_1." (".$polling->j_1.")"?></div>
				<div style="overflow: visible; padding: 10px 5px 10px 5px; margin-bottom: 10px;  overflow: hidden; background: #36FE3A; border: solid 1px #AFB0B4; width: <?=(($polling->j_2/$jumlah_vote)*100)?>%; font-size: <?=(($polling->j_2/$jumlah_vote)*400)?>%; height: 50px" title="<?=$polling->op_2." (".$polling->j_2.")"?>">
				<?=$polling->op_2." (".$polling->j_2.")"?></div>
				<div style="overflow: visible; color: #fff;padding: 10px 5px 10px 5px; margin-bottom: 10px;  overflow: hidden; background: #FFFD01; border: solid 1px #AFB0B4; width: <?=(($polling->j_3/$jumlah_vote)*100)?>%; font-size: <?=(($polling->j_3/$jumlah_vote)*400)?>%; height: 50px" title="<?=$polling->op_3." (".$polling->j_3.")"?>">
				<?=$polling->op_3." (".$polling->j_3.")"?></div>
				<div style="overflow: visible; padding: 10px 5px 10px 5px; background: red; overflow: hidden; border: solid 1px #AFB0B4; width: <?=(($polling->j_4/$jumlah_vote)*100)?>%; font-size: <?=(($polling->j_4/$jumlah_vote)*400)?>%; height: 50px" title="<?=$polling->op_4." (".$polling->j_4.")"?>">
				<?=$polling->op_4." (".$polling->j_4.")"?></div>
			</div>

			<?php 
			}
			?>
            </div>
          </div>
        </div>
      </div>