<!doctype html>
    <html>
        <head>
            <title>KATANA | <?php echo $title;?></title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

            <link href="<?php echo base_url('favicon.ico');?>" rel="shortcut icon">
            <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/galeri/css/style.css');?>" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/galeri/css/twd-base.css');?>" />    

            <script>
                    
                    $(function(){
                        $("#tanggal1").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        
                        $("#tanggal2").datepicker({
                            format:'yyyy-mm-dd'
                        
                        
                        $("#tanggal").datepicker({
                            format:'yyyy-mm-dd'
                        });
                    })
                    $(function() {
                        $('#gallery a').lightBox();
                    });
            </script>

            <style type='text/css'>
                body
                {
                    margin-top: 5%;
                }

                #transparan{
                    opacity: 0.8;
                }

                #wrapper {
                -moz-box-shadow: 0 0 15px #999;
                -webkit-box-shadow: 0 0 15px #999;
                -o-box-shadow: 0 0 15px #999;
                box-shadow: 0 0 15px #999;
                opacity: 0.5%;
                }

      </style>

        </head>
        <body>
            <?php echo $_header;?>
            
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <?php echo $_komplitsidebar;?>
                    </div>

                    <div class="col-md-6" style="margin-left:-2%; margin-right:-2%">
                        <?php echo $_content;?>
                    </div>

                    <div class="col-md-3">
                        <?php echo $_rightsidebar;?>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <?php echo $_footer;?>
                </div>
              </div>
            </div>

        </body>
    </html>