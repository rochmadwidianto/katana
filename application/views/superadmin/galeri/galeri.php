<div class="page-header">
      <h3><i class="glyphicon glyphicon-picture"></i>  Galeri <small>Gambar & Foto</small></h3>
    </div>

<div class="row" style="margin-bottom:2%">
    <div class="col-md-7">
        <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Pilih Karang Taruna <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
      
      <?php foreach($katana as $row) { ?>
      
    <li><a href="<?php echo site_url('superadmin/galeritiapKT/'.$row->id_karangtaruna);?>"><?php echo $row->namaKt; ?></a></li>
    <li class="divider"></li>
      <?php } ?>
  </ul>
</div>
    </div>
    
</div>
          <div class="panel panel-default" style="margin-top:1%">
            <div class="panel-body">
              <?php if (count($query) == 0){ ?>
                <div class="alert alert-danger" align="center"><b>Tidak ada data</b></div>
                <?php } ?>
                <div id="gallery">
                    <?php echo $this->session->flashdata('pesan');?>
                  <ul>
                    <?php $no=0; foreach($query as $rowdata ): $no++;?>
                    <li> 
                      <div class="well well-sm">
                      <a href="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" title="<?php echo $rowdata->ket_gbr;?>">
                        <img src="<?php echo base_url('assets/uploads/'.$rowdata->nm_gbr);?>" height="125px" width="125px"  alt="KATANA">
                      </a><br/>
                        <button align="center" class="btn btn-sm btn-danger" style="margin-top:2%; margin-left:22%;" onclick="hapus(<?php echo $rowdata->id; ?>)"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                      </div>
                    </li>
                        <?php endforeach;?>
                  </ul>
                </div>
            </div>
          </div>
       
<script>
    function hapus(id) {
        window.location = '<?php echo site_url('superadmin/hapus_galeri'); ?>/' + id;
    }
</script>