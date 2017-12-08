
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
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
                        <form action="<?php echo base_url();?>administrador/usuarios/store" method="POST">
                                 <div class="form-group">
                                    <div class="col-xs-6 col-md-6 col-lg-6 <?php echo form_error('nombre') != false ? 'has-error': '';?>"> 
                                        <label for="nombre" class="control-label" style="text-align: left;">Nombre:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input name="nombre"  class="form-control input-md" id="nombre" value="<?php echo set_value('nombre');?>">
                                        </div>                                        
                                        <?php echo form_error("nombre","<span clas='help-block'>","</span>"); ?>
                                    </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6"> 
                                        <label for="apellido" class="control-label" style="text-align: left;">Apellido:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input name="apellido"  class="form-control input-md" id="apellido">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 col-md-6 col-lg-6"> 
                                        <label for="telefono" class="control-label" style="text-align: left;">Telefono:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input name="telefono"  class="form-control input-md" id="telefono">
                                        </div> 
                                    </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6 <?php echo form_error('email') != false ? 'has-error': '';?>"> 
                                        <label for="email" class="control-label" style="text-align: left;">Email:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input name="email"  class="form-control input-md" id="apellido" value="<?php echo set_value('email');?>">
                                        </div>                                        
                                        <?php echo form_error("email","<span clas='help-block'>","</span>"); ?>
                                    </div>
                                </div>
                                <div class="fom-group">
                                    <div class="col-xs-4 col-md-4 col-lg-4 <?php echo form_error('user') != false ? 'has-error': '';?>"> 
                                        <label for="user" class="control-label" style="text-align: left;">User:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input type="text" name="user"  class="form-control input-md" id="user" value="<?php echo set_value('user');?>">
                                        </div>                                        
                                        <?php echo form_error("user","<span clas='help-block'>","</span>"); ?>
                                    </div>
                                    <div class="col-xs-4 col-md-4 col-lg-4 <?php echo form_error('pass') != false ? 'has-error': '';?>"> 
                                        <label for="pass" class="control-label" style="text-align: left;">Password:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <input type="password" name="pass"  class="form-control input-md" id="pass" value="<?php echo set_value('pass');?>">
                                        </div>                                        
                                        <?php echo form_error("pass","<span clas='help-block'>","</span>"); ?>
                                    </div>                    
                                    
                                    <div class="col-xs-4 col-md-4 col-lg-4 <?php echo form_error('rol') != false ? 'has-error':'';?>"> 
                                        <label for="rol" class="control-label" style="text-align: left;">Rol:</label>
                                        <div class="input-group col-xs-12 col-md-12">
                                            <select name="rol"  class="form-control input-md" id="rol">
                                            <option value="">Selecciones un tipo de Rol</option>
                                            <?php foreach ($roles as $rol):?>
                                                <option value="<?php echo $rol->rol;?>"><?php echo $rol->nombre;?></option>
                                            <?php endforeach; ?>    
                                            </select>
                                            <?php echo form_error("rol","<span clas='help-block'>","</span>"); ?>
                                        </div>                      
                                    </div>   
                                </div>
                                  
                                <div class="forn-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a class="btn btn-danger btn-flat" href="<?php echo base_url();?>administrador/usuarios">Cancelar</a>
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