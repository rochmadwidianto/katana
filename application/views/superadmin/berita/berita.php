<div class="page-header">
      <h3><i class="glyphicon glyphicon-bullhorn"></i>  Berita <small>Karang Taruna</small></h3>
    </div>
<div class="col-md-12 column">
			<div class="tabbable" id="tabs-123741">
				<div class="tab-content">
							<div class="row" style="margin-bottom:2%">
    <div class="col-md-7">
        <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Pilih Karang Taruna <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
      
      <?php foreach($katana as $row) { ?>
      
    <li><a href="<?php echo site_url('superadmin/beritatiapKT/'.$row->id_karangtaruna);?>"><?php echo $row->namaKt; ?></a></li>
    <li class="divider"></li>
      <?php } ?>
  </ul>
</div>
    </div>
    <div class="col-md-5">
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('superadmin/cariBeritaSemua');?>" method="post">
        <div class="form-group">
            <div class="col-md-1">
          <input type="text" name="cari" class="form-control" placeholder="Masukkan Judul Berita">
            </div>
        </div>
    <button type="submit" href="<?php echo site_url('superadmin/cariBeritaSemua');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
      </form>
    </div>
    
</div>
<?php if (count($informatika->result()) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
					<table class="table table-hover">
        <thead>
        <tr>
            <td align="center"><b>TANGGAL</b></td>
            <td align="center"><b>JUDUL BERITA</b></td>
            <td align="center"><b>ISI BERITA</b></td>
            <td colspan="2" align="center"></td>
        </tr>
    </thead>
        <?php foreach ($informatika->result() as $row) { ?>
    <tr>
        <td><?php echo tgl_indo($row->tanggal); ?></td>
        <td><b><?php echo ($row->judul); ?></b></td>   
        <td><?php echo ($row->isi); ?></td>
        
        <td><a href="<?php echo site_url('superadmin/hapusBerita/'.$row->id_berita);?>" rel="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
            <?php }	?>
</Table>

    </table>
						</p>
				</div>
			</div>
		</div>