
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
                <small>Edit</small>
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
                                                <label for="nombre" class="control-label" style="text-align: left;">Nombre:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="nombre"  class="form-control input-md" id="nombre" value="<?php echo $clientes->nombre?>">
                                                </div>                      
                                            </div>
                                        </div>
                                        <div class="from-group">
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="tipoCliente" class="control-label" style="text-align: left;">Tipo Cliente:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <select name="tipoCliente"  class="form-control input-md" id="tipoCliente">
                                                    <option value="">Selecciones un tipo de cliente</option>
                                                    <?php foreach ($tipoClientes as $tipoCliente):?>
                                                        <?php if($tipoClietne->tipo_cliente == $cliente->tipo_cliente): ?>
                                                            <option value="<?php echo $tipoCliente->tipo_cliente;?>" selected><?php echo $tipoCliente->nombre;?></option>
                                                        <?php  else:?>    
                                                        <option value="<?php echo $tipoCliente->tipo_cliente;?>"><?php echo $tipoCliente->nombre;?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>    
                                                    </select>
                                                </div>                      
                                            </div> 
                                            <div class="col-xs-12 col-md-6 col-lg-6"> 
                                                <label for="tipoDocumento" class="control-label" style="text-align: left;">Tipo Documento:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <select name="tipoDocumento"  class="form-control input-md" id="tipoDocumento">
                                                    <option value="">Selecciones un tipo de Documento</option>
                                                    <?php foreach ($tipoDocumentos as $tipoDocumento):?>
                                                        <?php if($tipoDocumento->tipo_documento == $clientes->tipo_documento): ?>
                                                            <option value="<?php echo $tipoDocumento->tipo_documento;?>" selected><?php echo $tipoDocumento->nombre;?></option>
                                                        <?php  else:?>    
                                                        <option value="<?php echo $tipoDocumento->tipo_documento?>"><?php echo $tipoDocumento->nombre;?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>    
                                                    </select>
                                                </div>                      
                                            </div>  
                                        </div>
                                         <div class="form-group">
                                            <div class="col-xs-12 col-md-4 col-lg-4"> 
                                                <label for="numDocumento" class="control-label" style="text-align: left;">Numero de Documento:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="numDocumento"  class="form-control input-md" id="numDocumento" value="<?php echo $clientes->num_documento?>"></div>                      
                                            </div>  
                                            <div class="col-xs-12 col-md-4 col-lg-4"> 
                                                <label for="direccion" class="control-label" style="text-align: left;">Direccion:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="direccion"  class="form-control input-md" id="direccion" value="<?php echo $clientes->direccion?>"></div>                      
                                            </div>                                            
                                            <div class="col-xs-12 col-md-4 col-lg-4"> 
                                                <label for="telefono" class="control-label" style="text-align: left;">Telefono:</label>
                                                <div class="input-group col-xs-12 col-md-12">
                                                    <input name="telefono"  class="form-control input-md" id="telefono" value="<?php echo $clientes->telefono?>"></div>                      
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