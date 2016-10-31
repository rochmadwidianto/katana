<!-- <div class="col-md-4 col-md-offset-8" style="margin-bottom:-5%">
    <?php foreach($katana as $row) { ?>
        <div class="alert alert-info alert-dismissable" id="wrapper" style="margin-top:4%">
            Karangtaruna : <b><?php echo $row->namaKt; ?></b>
    </div>
    <?php } ?>
      </div> -->
<div class="page-header">
      <h3><i class="glyphicon glyphicon-list-alt"></i>  Data Anggota <small>Karang Taruna</small></h3>
      
    </div>
<div class="row" style="margin-bottom:2%">
    <div class="col-md-7">
        <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <?php echo $namaKt; ?> <span class="caret"></span>
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
<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('superadmin/cariBerita/' . $kt);?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama kegiatan">
                            </div>
                      <button type="submit" href="<?php echo site_url('superadmin/cariBerita');?>" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
    </div>
    
</div>
<?php if (count($perKT) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <td align="center"><b>TANGGAL</b></td>
            <td align="center"><b>JUDUL BERITA</b></td>
            <td align="center"><b>ISI BERITA</b></td>
            <td colspan="2" align="center"></td>
        </tr>
    </thead>
        <?php $no=0; foreach($perKT as $row ): $no++;?>
    <tr>
        <td><?php echo tgl_indo($row->tanggal); ?></td>
        <td><b><?php echo ($row->judul); ?></b></td>   
        <td><?php echo ($row->isi); ?></td>
        
        <td><a href="<?php echo site_url('superadmin/hapusBerita/'.$row->id_berita);?>" rel="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
    </table>
