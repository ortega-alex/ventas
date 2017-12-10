
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
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
                        <form action="<?php echo base_url();?>administrador/permisos/update" method="POST">
                            <input type="hidden" value="<?php echo $permisos->permiso;?>" name="permiso">
                            <div class="from-group">
                                <div class="col-xs-12 col-md-6 col-lg-6 <?php echo form_error('menu') != false ? 'has-error':'';?>"> 
                                    <label for="menu" class="control-label" style="text-align: left;">Menus:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <select name="menu"  class="form-control input-md" id="menu" disabled="disabled">
                                        <option value="">Selecciones un tipo de Rol</option>
                                        <?php foreach ($menus as $menu):?>
                                            <?php if($menu->menu == $permisos->menu_id): ?>
                                                <option value="<?php echo $menu->menu;?>" selected><?php echo $menu->nombre;?></option>
                                            <?php  else:?>    
                                            <option value="<?php echo $menu->menu;?>"><?php echo $menu->nombre;?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>    
                                        </select>
                                        <?php echo form_error('menu','<span class="hel-block">','</span>');?>
                                    </div>                      
                                </div>   
                                <div class="col-xs-12 col-md-6 col-lg-6 <?php echo form_error('rol') != false ? 'has-error':'';?>"> 
                                    <label for="rol" class="control-label" style="text-align: left;">Rol:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <select name="rol"  class="form-control input-md" id="rol" disabled="disabled">
                                        <option value="">Selecciones un tipo de Rol</option>
                                        <?php foreach ($roles as $rol):?>
                                            <?php if($rol->rol == $permisos->rol_id): ?>
                                                <option value="<?php echo $rol->rol;?>" selected><?php echo $rol->nombre;?></option>
                                            <?php  else:?>    
                                            <option value="<?php echo $rol->rol;?>"><?php echo $rol->nombre;?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>    
                                        </select>
                                        <?php echo form_error('rol','<span class="hel-block">','</span>');?>
                                    </div>                      
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 col-md-3 col-lg-3">
                                    <label for="read" class="control-label" style="text-align: left;">Leer:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <label for="radio-inline">
                                            <input type="radio" name="read" value="1" <?php echo $permisos->read == 1?"checked":"";?>> SI
                                        </label>
                                        <label for="radio-inline">
                                            <input type="radio" name="read" value="0" <?php echo $permisos->read == 0 ? "checked":"";?>> No
                                        </label>
                                    </div> 
                                </div>
                                <div class="col-xs-6 col-md-3 col-lg-3">
                                    <label for="insert" class="control-label" style="text-align: left;">Agregar:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <label for="radio-inline">
                                            <input type="radio" name="insert" value="1"  <?php echo $permisos->insert == 1 ? "checked":"";?>> SI
                                        </label>
                                        <label for="radio-inline">
                                            <input type="radio" name="insert" value="0" <?php echo $permisos->insert == 0  ? "checked":"";?>> No
                                        </label>
                                    </div> 
                                </div>
                                <div class="col-xs-6 col-md-3 col-lg-3">
                                    <label for="update" class="control-label" style="text-align: left;">Actualizar:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <label for="radio-inline">
                                            <input type="radio" name="update" value="1"  <?php echo $permisos->update == 1 ? "checked":"";?>> SI
                                        </label>
                                        <label for="radio-inline">
                                            <input type="radio" name="update" value="0" <?php echo $permisos->update == 0 ? "checked":"";?>> No
                                        </label>
                                    </div> 
                                </div>
                                <div class="col-xs-6 col-md-3 col-lg-3">
                                    <label for="delete" class="control-label" style="text-align: left;">Eliminar:</label>
                                    <div class="input-group col-xs-12 col-md-12">
                                        <label for="radio-inline">
                                            <input type="radio" name="delete" value="1"  <?php echo $permisos->delete == 1 ? "checked":"";?>> SI
                                        </label>
                                        <label for="radio-inline">
                                            <input type="radio" name="delete" value="0" <?php echo $permisos->delete == 0 ? "checked":"";?>> No
                                        </label>
                                    </div> 
                                </div>
                            </div>
                            <div class="forn-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <a class="btn btn-danger btn-flat" href="<?php echo base_url();?>administrador/permisos">Cancelar</a>
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