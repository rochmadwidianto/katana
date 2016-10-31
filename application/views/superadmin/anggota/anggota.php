<div class="page-header">
      <h3><i class="glyphicon glyphicon-user"></i>  Data Anggota <small>Karang Taruna</small></h3>
    </div>
<div class="row" style="margin-bottom:2%">
    <div class="col-md-7">
        <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Pilih Karang Taruna <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
      
      <?php foreach($katana as $row) { ?>
      
    <li><a href="<?php echo site_url('superadmin/anggotatiapKT/'.$row->id_karangtaruna);?>"><?php echo $row->namaKt; ?></a></li>
    <li class="divider"></li>
      <?php } ?>
  </ul>
</div>
    </div>
    <div class="col-md-5">
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('superadmin/cariAggSemua');?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama anggota">
                            </div>
                      <button type="submit" href="<?php echo site_url('superadmin/cariAggSemua');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
    </div>
    
</div>
<?php if (count($anggota) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <td align="center"><b>NO</b></td>
            <td align="center"><b>FOTO</b></td>
            <td align="center"><b>NAMA</b></td>
            <td align="center"><b>JENIS KELAMIN</b></td>
            <td align="center"><b>AGAMA</b></td>
            <td align="center"><b>TANGGAL LAHIR</b></td>
            <td align="center"><b>ALAMAT</b></td>
            <td align="center"><b>NO. HP</b></td>
            <td align="center"><b>STATUS</b></td>
            <td align="center"><b>PEKERJAAN</b></td>
            <td colspan="2" align="center"></td>
        </tr>
    </thead>
        <?php $no=0;
        $agama = array(
            '-',
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Budha'
        );

        foreach($anggota as $row ): $no++;?>
    <tr>
        <td align="center"><?php echo $no;?></td>
        <td align="center"><img src="<?php echo base_url('assets/img/anggota/'.$row->fotoAgg);?>" height="50px" width="50px" class="img-circle"></td>
        <td><b><?php echo $row->namaAgg;?></b></td>
        <td align="center"><?php echo $row->jk == '1' ? 'Laki laki' : 'Perempuan';?></td>
        <td align="center"><?php echo $agama[$row->agamaAgg];?></td>
        <td align="center"><?php echo tgl_indo($row->ttlAgg); ?></td>
        <td align="center"><?php echo $row->alamatAgg;?></td>
        <td align="center"><?php echo $row->hpAgg;?></td>
        <td align="center"><?php echo $row->statusAgg == '1' ? 'Belum menikah' : 'Menikah';?></td>
        <td align="center"><?php echo $row->pekerjaanAgg;?></td>
        
        <td><a href="<?php echo site_url('superadmin/hapusAgg/'.$row->idAgg);?>"   rel="tooltip" title="Hapus" class="hapus" kode="" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

    </table>
