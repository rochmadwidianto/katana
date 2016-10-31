<!doctype html>
    <html>
        <head>
            <title>KATANA</title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('favicon.ico');?>" rel="shortcut icon">

            <script type="text/javascript" src="<?php echo base_url('assets/tooltip/js/jquery-1.11.1.min.js');?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/tooltip/js/bootstrap.min.js');?>"></script>

            <script>
        $(function(){
            $('a').tooltip();
        });

        $(function(){
            $("a[rel=popover]").popover(
            {
                placement : 'bottom',
                trigger : 'hover'
            });
        })
      </script>
            <style type='text/css'>
                
                #transparan{
                    opacity: 0.8;
                }

                #wrapper {
                -webkit-box-shadow: 0 0 20px #222;
                -moz-box-shadow: 0 0 20px #222;
                box-shadow: 0 0 20px #222;
                
                }

                #wrapper3{
                -webkit-box-shadow: 0 0 20px #222;
                -moz-box-shadow: 0 0 20px #222;
                box-shadow: 0 0 20px #222;
                -moz-border-radius: 15px;
                -webkit-border-radius: 15px;
                -o-border-radius: 15px;
                border-radius: 15px;
                -moz-border: 3px solid #1E90FF;
                -webkit-border: 3px solid #1E90FF;
                -o-border: 3px solid #1E90FF;
                border: 3px solid #1E90FF;
                }

      </style>

        </head>
        <body>
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <div class="navbar-header" style="margin-top:-0.3%">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo site_url('web')?>"><h4>KATANA</h4></a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:1%">
                    <ul class="nav navbar-nav navbar-right" style="margin-right:1%">
                        
                    </ul>
                </div>

                <div class="row clearfix" style="margin-top:2%">
                    <div class="col-md-9 column" style="border: 2px solid #FFA500">
                    </div>
                    <div class="col-md-1 column" style="border: 2px solid #1E90FF">
                    </div>
                    <div class="col-md-1 column" style="border: 2px solid #00CC00">
                    </div>
                    <div class="col-md-1 column" style="border: 2px solid #FF0000">
                    </div>
                </div>
            </nav>
        </div>
            
            <div class="container-fluid" style="margin-top:4.3%; padding-bottom:3%" >
                <div class="row">
                    <div class="container-fluid" id="wrapper" style="background-color: #1E90FF; padding-bottom:3%" >
                        <div class="row" align="right" style="margin-bottom:-3%; margin-top:0.1%; margin-right:-1%"> <b>LOGIN</b> 
                                                <div class="btn-group" role="group" aria-label="">
                                                    <a href="<?php echo site_url('web');?>" rel="tooltip" title="Halaman login ANGGOTA."><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Anggota</button></a>
                                                    <a href="<?php echo site_url('web/admin_login');?>" rel="tooltip" title="Halaman login ADMIN KARANG TARUNA."><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i> Admin Karang Taruna</button></a>
                                                    <a href="<?php echo site_url('web/tambah_katana');?>" rel="popover" title="Karang Taruna anda belum terdaftar?" data-content="Segera daftarkan Karang Taruna anda dan nikmati fitur - fitur KATANA yang dapat membantu anda dalam mengelola segala aktifitas dan data Karang Taruna."><button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> Karang Taruna</button></a>
                                                </div>
                                            </div>
                    </div>
                    <div class="container-fluid" id="wrapper" style="background-color:#00BFFF; padding-bottom:2%" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6" id="wrapper3" style="background-color:#B0C4DE; margin-top: 3%; padding-bottom:8%">
                                    <div class="row" style="margin-bottom:4.6%">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="row" align="center">
                                            <img src="<?php echo base_url('assets/img/logo.png');?>" width="80px" height="80px" style="margin-bottom:3%; margin-top:5%"><br><font size="3">LOGIN<br><b>ADMIN SISTEM</b></font><br><font size="2">SISTEM INFORMASI KEGIATAN KARANG TARUNA</font>
                                            </div>
                                            <div class="row" align="center" style="margin-TOP:5%;">
                                            <form class="form-horizontal" align="center" role="form" action="<?php echo site_url('web/logpetugas');?>" method="post">
                                                <?php echo $this->session->flashdata('message');?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Masukkan Username" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Masukkan Password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group last">
                                                    <div class="col-sm-offset-4 col-sm-12">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <b><i class="glyphicon glyphicon-log-in"></i> Login</b></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
    </div>

    <div class="container-fluid" style="background-color: #DCDCDC; padding-bottom:1.5%; padding-top:2%; margin-top:-3%" >
                        <p align="center"><font color="#808080 " size:"10%"><b>KATANA | SISTEM INFORMASI KEGIATAN KARANG TARUNA</b> <br> 
                      Created By <i>Rochmad Widianto</i> | 
                      Copyright &copy; <b>2015</b></font></p>
    </div>
        </body>
    </html>