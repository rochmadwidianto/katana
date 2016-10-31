<div class="col-md-12 column" id="wrapper" style="background-color:#B0E0E6; border: 1px solid #8A9B9B; margin-bottom:5%">
    
    <div class="alert alert-info alert-dismissable" id="wrapper" style="margin-top:4%">
            <p align="center"><?php
                
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
                ?> </p>
    </div>
    
			<div class="page-header">
				<h4>
                    <i class="glyphicon glyphicon-signal"></i> Pengunjung <small>KATANA</small>
				</h4>
			</div>
			<ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?php echo $this->m_pengunjung->hari();?></span>
                    <h6>Pengunjung Hari Ini</h6>
                </li>
                <li class="list-group-item">
                    <span class="badge"><?php echo $this->m_pengunjung->bulan($bulan);?></span>
                    <h6>Pengunjung Bulan Ini</h6>
                </li>
                <li class="list-group-item">
                    <span class="badge"><?php echo $this->m_pengunjung->tahun($tahun);?></span>
                    <h6>Pengunjung Tahun Ini</h6>
                </li>
                <li class="list-group-item">
                    <span class="badge"><?php echo $this->m_pengunjung->total();?></span>
                    <h6><b>TOTAL PENGUNJUNG</b></h6>
                </li>
            </ul>

             
</div>

<div class="col-md-12 column" id="wrapper" style="background-color:#B0E0E6; border: 1px solid #8A9B9B; margin-bottom:5%">
			<div class="page-header">
				<h4>
                    <i class="glyphicon glyphicon-stats"></i> Polling <small>KATANA</small>
				</h4>
			</div>
			<form action="<?php echo site_url('dashboard/post_poll');?>" method="post">
				<?php 
				$poll = $this->db->query("SELECT * FROM poll ORDER BY id DESC LIMIT 1")->row();
				?>
				<label><?=$poll->tanya?></label></br>
				<input type="hidden" name="id_poll" value="<?=$poll->id?>">
			
				<font><input type="radio" value="1" name="poll" id="satu" required> <?=$poll->op_1?></font></br>
				
				<font><input type="radio" value="2" name="poll" id="dua" required> <?=$poll->op_2?></font></br>
				
				<font><input type="radio" value="3" name="poll" id="tiga" required> <?=$poll->op_3?></font></br>
				
				<font><input type="radio" value="4" name="poll" id="empat" required> <?=$poll->op_4?></font></br>
				
<div class="alert alert-info alert-dismissable" style="margin-top:4%"><input type="submit" class="btn btn-sm btn-primary" value="Kirim"> &nbsp;&nbsp; <input type="button" value="Lihat Hasil" class="btn btn-sm btn-primary" onclick="window.open('<?php echo site_url('dashboard/hasil_poll');?>', '_self')"></div>
				</form>
</div>

<div class="col-md-12 column" id="wrapper" style="background-color:#B0E0E6; border: 1px solid #8A9B9B; margin-bottom:5%">
			<div class="page-header">
				<h4>
                    <i class="glyphicon glyphicon-stats"></i> Statistik
				</h4>
			</div>
			<ul>
                <b>IP Anda :</b> <?php echo $this->input->ip_address(); ?><br>
                <b>Browser Anda :</b> <?php echo $this->input->user_agent(); ?>
            </ul>

</div>
