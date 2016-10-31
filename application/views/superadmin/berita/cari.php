<div class="page-header">
      <h3><i class="glyphicon glyphicon-search"></i>  Hasil Pencarian <small>Berita</small></h3>
    </div>
<div class="col-md-12 column">
			<div class="tabbable" id="tabs-123741">
				<div class="tab-content">
                    <?php if (count($hasil) == 0){ ?>
                <div class="alert alert-danger">Data tidak ditemukan</div>
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
        <?php foreach ($hasil as $row) { ?>
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