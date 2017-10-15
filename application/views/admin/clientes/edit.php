
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
                <small>Nuevo</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12"> 
                                <?php if($this->session->flashdata('error')):?>
                                    <div class="alert alert-danger alert-sismissible">
                                        <button class="close" type="button" data-dismiss='alert' aria-hideen='true'>
                                            &times;
                                            <p><i class="icon fa fa-ban"></i>
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </p>
                                        </button>
                                    </div>  
                                <?php endif; ?>                                     
                                <form action="<?php echo base_url();?>mantenimiento/clientes/update" method="POST">
                                    <input type="hidden" value="<?php echo $clientes->cliente;?>" name="cliente">
                                    <div class="form-group">
                                            <div class="col-xs-12 col-md-12 col-lg-12"> 
                                                <label for="nit" class="control-label" style="text-align: left;">Nit:</label>
                                                <div class="input-group col-xs-6 col-md-6">
                                                    <input name="nit"  class="form-control input-md" id="nit" readonly="readonly" value="<?php echo $clientes->nit?>">
                                                </div>                      
                                            </div>  
                                         </div>   
                                        <div class="form-group">
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="nombre" class="control-label" style="text-align: left;">Nombre:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="nombre"  class="form-control input-md" id="nombre" value="<?php echo $clientes->nombre?>">
                                                </div>                      
                                            </div>                                            
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="apellido" class="control-label" style="text-align: left;">Apelido:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="apellido"  class="form-control input-md" id="apellido" value="<?php echo $clientes->apellido?>">
                                                </div>                      
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="direccion" class="control-label" style="text-align: left;">Direccion:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="direccion"  class="form-control input-md" id="direccion" value="<?php echo $clientes->direccion?>"></div>                      
                                            </div>                                            
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="telefono" class="control-label" style="text-align: left;">Telefono:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="telefono"  class="form-control input-md" id="telefono" value="<?php echo $clientes->telefono?>"></div>                      
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-xs-12 col-md-12 col-lg-12"> 
                                                <label for="empresa" class="control-label" style="text-align: left;">Empresa:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="empresa"  class="form-control input-md" id="empresa" value="<?php echo $clientes->empresa?>"></div>                      
                                            </div>  
                                         </div> 

                                        <div class="forn-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                                <a class="btn btn-danger btn-flat" href="<?php echo base_url();?>mantenimiento/clientes">Cancelar</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->