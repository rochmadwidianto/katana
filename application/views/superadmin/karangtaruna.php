<div class="page-header">
      <h3><i class="glyphicon glyphicon-th-large"></i>  Data Karang Taruna </h3>
    </div>
<div class="row" style="margin-bottom:2%">

    <div class="col-md-5 col-md-offset-8">

<form class="form-inline" role="search" action="<?php echo site_url('superadmin/cariKT');?>" method="post">
        <div class="form-group">
            <div class="col-md-1">
          <input type="text" name="cari" class="form-control" placeholder="Masukkan Nama Karang Taruna">
            </div>
        </div>
    <button type="submit" href="<?php echo site_url('superadmin/cariKT');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
      </form>
    </div>
    
</div>
<?php if (count($katana) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <td align="center"><b>NO</b></td>
            <td align="center"><b>NAMA KARANG TARUNA</b></td>
            <td align="center"><b>ALAMAT</b></td>
            <td align="center"><b>TENTANG</b></td>
            <td align="center"><b>NAMA ADMIN</b></td>
            <td align="center"><b>NO. HP ADMIN</b></td>
            <td colspan="1" align="center"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($katana as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td><b><?php echo $row->namaKt;?></b></td>
        <td align="center"><?php echo $row->alamatKt;?></td>
        <td align="center"><?php echo $row->tentangKt;?></td>
        <td align="center"><?php echo $row->namaAd;?></td>
        <td align="center"><?php echo $row->hpAd;?></td>

        <td><a href="<?php echo site_url('superadmin/hapusKt/'.$row->id_karangtaruna);?>" rel="tooltip" title="Hapus" class="hapus" kode="" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

    </table>