<div class="page-header">
      <h3><i class="glyphicon glyphicon-search"></i>  Hasil Pencarian <small>Kegiatan</small></h3>
    </div>
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
            <td colspan="2"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($hasil as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        
        <td align="center"><b><?php echo $row->namaKeg;?></b></td>
        <td><?php echo $row->deskripsiKeg;?></td>
        <td align="center"><?php echo tgl_indo($row->tanggalKeg); ?></td>
        
        <td><a href="<?php echo site_url('admin/edit_kegiatan/'.$row->idKeg);?>" rel="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="<?php echo site_url('admin/hapusKeg/'.$row->idKeg);?>"  rel="tooltip" title="Hapus" class="hapus" kode="" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
    </table>
