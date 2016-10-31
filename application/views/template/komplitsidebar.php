<div class="col-md-12 column" id="wrapper" style="background-color:#B0C4DE; border: 2px solid #778899; padding-top:2%; padding-bottom:2%" align="center">
			<?php foreach($profil as $row) { ?>
      <img src="<?php echo base_url('assets/img/anggota/'.$row->fotoAgg);?>" style="margin-top:5%" width="70px" height="70px"  class="img-circle"><br> <a href="<?php echo site_url('dashboard/profil');?>" class="btn" type="button"><?php echo $this->session->userdata('username');?></a>
			<?php }?>
      <div class="page-header"></div>
      <div class="alert alert-info alert-dismissable" id="wrapper" style="margin-top:2%">
        <small>Karang Taruna Anda</small><br>
          <label><?php echo "$row->namaKt";?></label>
      </div>
</div>
                <!DOCTYPE html>
                    <html lang="en">
                    <head>
<meta charset="utf-8">
                        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script src="assets/js/jquery.js"></script> 
                        <script>    
                            $(document).ready(function(){
                            
                            function tampildata(){
                               $.ajax({
                                type:"POST",
                                url:"<?=site_url('dashboard/ambil_pesan');?>",    
                                success: function(data){                 
                                         $('#isi_chat').html(data);
                                }  
                               });
                            }
                      
                             $('#kirim').click(function(){
                               var pesan = $('#pesan').val(); 
                               var user = $('#user').val(); 
                               $.ajax({
                                type:"POST",
                                url:"<?=site_url('dashboard/kirim_chat');?>",    
                                data: 'pesan=' + pesan + '&user=' + user,        
                                success: function(data){                 
                                  $('#isi_chat').html(data);
                                }  
                               });
                              });
                              setInterval(function(){
                                         tampildata();},1000);
                            });
                        </script>
                        <style>
                          #isi_chat{height:300px; font-size: 13px; margin-left: 3%}
                        </style>
                    </head>

                    <body>
                    
                    <div class="row" >
                        <div class="col-md-12">

                          <div class="panel panel-default" style="margin-top:3%">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-comment">
                                      </span>  Obrolan <small>Percakapan</small></a>
                                  </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <div style="padding:3px; overflow:auto; width:auto; height:250px">
                                        <ul id="isi_chat"> </ul>
                                    </div>
                                      <div class="page-header"></div>
                                    <div class="row">
                                        
                                    <form class="form-horizontal" action="" method="post">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input placeholder="Masukkan Nama" value="<?php echo $this->session->userdata('username');?>" type="hidden" id="user" readonly="readonly" class="form-control">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-md-12">
                              <input placeholder="Masukkan Pesan" type="text" id="pesan" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-lg-5 col-lg-offset-7">
                              <input type="button" value="Kirim" id="kirim" class="btn btn-sm btn-info">
                          </div>
                      </div>
                    </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>

                    <div class="panel panel-group">
                            <div class="panel panel-default" style="margin-top:10%">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                                        </span>  Anggota <small>KATANA</small></a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div style="padding:3px; overflow:auto; width:auto; height:250px">
                                            <?php foreach($katanaAgg as $row) { ?>
                                        
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <b><?php echo $row->namaKt; ?></b></br>
                                            <small><?php echo $row->alamatKt; ?></small>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php } ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-bullhorn">
                            </span>  Berita <small>Karang Taruna</small></a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <?php foreach($berita as $list) { ?>
                                        
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <i class="glyphicon glyphicon-bullhorn"></i>   <a href="<?php echo site_url('dashboard/read'); ?>/<?php echo $list['id_berita']; ?>"><?php echo $list['judul']; ?></a></br>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-tags">
                            </span>  Jumlah Kegiatan <small>Karang Taruna</small></a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div style="padding:3px; overflow:auto; width:auto; height:250px">
                                            <?php foreach($katana as $row) { ?>
                                        
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge"><?php echo $row->total; ?></span>
                                            <b><?php echo $row->namaKt; ?></b></br>
                                <small><i><?php echo $row->alamatKt; ?></i></small>
                                    </li>
                                </ul>
                                        <?php } ?>
                                        </div>
                        </div>
                    </div>
                </div>
        <p align="center"><small>Aturan | Tentang | Ketentuan </br>Penggunaan Sistem Informasi Kegiatan Karang Taruna - <b>KATANA<i></b> <a href="<?php echo site_url ('dashboard/aturan');?>">klik disini</small></p></a>
</div>
</body>
</html>