<div class="page-header">
      <h3><i class="glyphicon glyphicon-search"></i>  Hasil Pencarian</h3>
    </div>
    <?php if (count($hasil) == 0){ ?>
                <div class="alert alert-danger">Data tidak ditemukan</div>
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
        <?php $no=0; foreach($hasil as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td><b><?php echo $row->namaKt;?></b></td>
        <td align="center"><?php echo $row->alamatKt;?></td>
        <td align="center"><?php echo $row->tentangKt;?></td>
        <td align="center"><?php echo $row->namaAd;?></td>
        <td align="center"><?php echo $row->hpAd;?></td>

        <td><a href="#" class="hapus" kode="<?php echo $row->id_karangtaruna;?>" rel="tooltip" title="Hapus" ><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>
