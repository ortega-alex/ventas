
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        producto
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
                        <form action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                             <div class="panel panel-primary">
                             <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="codigo" class="control-label" style="text-align: left;">Codigo:</label>
                                        <div class="input-group col-xs-12 col-md-12 <?php echo !empty(form_error('codigo'))? 'has-error':'';?>">
                                            <input name="codigo"  class="form-control input-md" id="codigo" type="number" value="<?php echo set_value("codigo");?>">
                                            <?php echo form_error("codigo","<span class='help-block'>","</span>"); ?>
                                        </div>                      
                                    </div> 
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="categoria" class="control-label" style="text-align: left;">Categoria:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <select name="categoria"  class="form-control input-md" id="categoria">
                                            <option value="">Selecciones una categoria</option>
                                            <?php foreach ($categorias as $categoria):?>
                                                <option value="<?php echo $categoria->categoria;?>"><?php echo $categoria->nombre;?></option>
                                            <?php endforeach; ?>    
                                            </select>
                                        </div>                      
                                    </div>   
                                 </div>   
                                <div class="form-group ">
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="nombre" class="control-label" style="text-align: left;">Nombre:</label>
                                        <div class="input-group col-xs-12 col-md-12 <?php echo !empty(form_error('nombre'))? 'has-error':'';?>">
                                            <input name="nombre"  class="form-control input-md" id="nombre" type="text" value="<?php echo set_value("nombre");?>">
                                            <?php echo form_error("nombre","<span class='help-block'>","</span>"); ?>
                                        </div>                      
                                    </div>                                            
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="descripcion" class="control-label" style="text-align: left;">Descripcion:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input name="descripcion"  class="form-control input-md" id="descripcion" >
                                        </div>                      
                                    </div>
                                </div>
                                 <div class="form-group ">
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="precio" class="control-label" style="text-align: left;">Precio:</label>
                                        <div class="input-group col-xs-12 col-md-12 <?php echo !empty(form_error('precio'))? 'has-error':'';?>">
                                            <input type="text" name="precio"  class="form-control input-md" id="precio" value="<?php echo set_value("precio");?>">
                                            <?php echo form_error("precio","<span class='help-block'>","</span>"); ?>
                                        </div>                      
                                    </div>                                            
                                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                                        <label for="stock" class="control-label" style="text-align: left;">Stock:</label>
                                        <div class="input-group col-xs-12 col-md-12 <?php echo !empty(form_error('stock'))? 'has-error':'';?>">
                                            <input name="stock" type="number" class="form-control input-md" id="stock" value="<?php echo set_value("stock");?>">
                                            <?php echo form_error("stock","<span class='help-block'>","</span>"); ?>
                                        </div>                      
                                    </div>
                                </div> 
                            </div>
                            <div class="panel-footer">    
                                <div class="forn-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a class="btn btn-danger btn-flat" href="<?php echo base_url();?>mantenimiento/productos">Cancelar</a>
                                    </div>
                                </div>
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