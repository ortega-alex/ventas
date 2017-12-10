
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Categoria
                <small>Editar</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="row">
                    <div class="col-xs-6 col-lg-3">
                        <!--mail box-->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $canClientes;?></h3>
                                <p>Clientes</p>
                            </div>
                            <div class="icon">
                                <a href="<?php echo base_url();?>mantenimiento/clientes"><i class="ion ion-bag"></i></a>
                            </div>
                            <a href="<?php echo base_url();?>reportes/clientes" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-lg-3">
                        <!--small box-->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $canProductos;?><sup style="font-size: 20px">%</sup></h3>
                                <p>Productos</p>
                            </div>
                            <div class="icon">
                                <a href="<?php echo base_url();?>mantenimiento/productos"><i class="ion-stats-bars"></i></a>
                            </div>
                            <a href="<?php echo base_url();?>reportes/productos" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-lg-3">
                        <!--mail box-->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $canUsuarios;?></h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <a href="<?php echo base_url();?>administrador/usuarios"><i class="ion ion-person-add"></i></a>
                            </div>
                            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-lg-3">
                        <!--mail box-->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $canVentas;?></h3>
                                <p>Ventas</p>
                            </div>
                            <div class="icon">
                                <a href="<?php echo base_url();?>movimientos/ventas"><i class="ion ion-pie-graph"></i></a>
                            </div>
                            <a href="<?php echo base_url();?>reportes/ventas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Monitor de Reporte</h3>
                                <div class="box-tools pull-fight">
                                    <select name="year" id="year" class="form-control">
                                        <?php foreach($years as $year):?>
                                            <option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>                
                            </div>  
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="grafico" style="margin:0 auto;">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->