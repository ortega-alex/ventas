<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Ventas | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <!--datatable-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.css">
    <!--jquery-iu-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
    <!--datatable-export-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dataTables-export/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini"><header class="main-header">
<!-- Logo -->
<a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>V</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SISVEN</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url()?>assets/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo  $this->session->userdata('nombre').' '.$this->session->userdata('apellido')?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <a href="<?php echo base_url();?>auth/logout"> Cerrar Sesión</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
