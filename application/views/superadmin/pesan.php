<div class="page-header">
      <h3><i class="glyphicon glyphicon-envelope"></i>  Data Pesan </h3>
    </div>
<div class="row" style="margin-bottom:2%">

    <div class="col-md-5 col-md-offset-8">
    </div>
    
</div>
<?php if (count($pesan) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <td align="center"><b>NO</b></td>
            <td align="center"><b>NAMA PENGIRIM</b></td>
            <td align="center"><b>EMAIL</b></td>
            <td align="center"><b>PESAN</b></td>
            <td align="center"><b>TANGGAL</b></td>
            <td colspan="1" align="center"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($pesan as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td><b><?php echo $row->nama;?></b></td>
        <td align="center"><?php echo $row->email;?></td>
        <td align="center"><?php echo $row->pesan;?></td>
        <td align="center"><?php echo $row->tgl;?></td>

        <td><a href="<?php echo site_url('superadmin/hapusPesan/'.$row->id);?>" rel="tooltip" title="Hapus" class="hapus" kode="" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

    </table>