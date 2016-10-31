<ol id="wrapper" class="breadcrumb" style="padding-top:1%; padding-bottom:1%; margin-bottom:2%">
    <li><a href="<?php echo ('dashboard');?>"><i class="glyphicon glyphicon-home"></i>  Beranda</a></li>
    <li class="active"><i class="glyphicon glyphicon-info-sign"></i>  Aturan | Tentang | Ketentuan</li>
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
                    <h3><i class="glyphicon glyphicon-info-sign"></i>  Tentang <small>Sistem</small></h3>
                </div>
                <font><p><b>Sistem Informasi Kegiatan Karang Taruna</b> merupakan sebuah sistem berbasis web yang dirancang dengan tujuan untuk mengelola data Karang Taruna seperti : Data anggota, Data kegiatan, Data berita dan Data gambar atau foto. Semua data tersebut disimpan dalam database sistem. Selain itu, tujuan dari perancangan Sistem Informasi Kegiatan Karang Taruna adalah untuk menciptakan kompetisi antar Karang Taruna dengan cara memaksimalkan kegiatan - kegiatan yang dilaksanakan dengan cara berbagi berita antar Karang Taruna.</p></font>
				<div class="page-header">
				  <h3><i class="glyphicon glyphicon-warning-sign"></i>  Peraturan <small>Sistem</small></h3>
				</div>
                <font><p>1. Gunakan data sebaik mungkin dan penuh tangung jawab.</br>
                2. Lakukan <i>update</i> data apabila ada perubahan.</br>
3. Manfaatkan sistem semaksimal mungkin untuk mendukung kemajuan Karang Taruna Anda.</br>
4. Segala bentuk komplain, konsultasi, dll hubungi admin Karang Taruna masing - masing.</p></font>
                <div class="page-header">
                        <h3><i class="glyphicon glyphicon-book"></i>  Ketentuan <small>Sistem</small></h3>
                </div>
                <font><p>1. Keamanan data ditanggung oleh pengguna.</br>
2. Developer tidak bertanggung jawab atas penyalahgunaan data dalam sistem.</br>
3. Pengelolaan data ditanggung sepenuhnya oleh admin Karang Taruna masing - masing.</br>
4. Dilarang memasukkan data berupa apapun yang bersifat SARA, porno, menyinggung, melecehkan, menipu, merendahkan, memaksa, mem-<i>bully</i> dan yang dapat menimbulkan kekerasan dengan pengguna lain.</br>
5. Developer hanya berlaku sebagai penyedia layanan, sehingga segala bentuk tindakan yang akan dilakukan oleh developer terhadap data Karang Taruna akan dilakukan dengan persetujuan admin Karang Taruna yang bersangkutan terlebih dahulu.</p></font>
            </div>