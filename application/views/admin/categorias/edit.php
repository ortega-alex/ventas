
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorias
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
                        <form action="<?php echo base_url();?>mantenimiento/categorias/update" method="POST">
                            <input type="hidden" value="<?php echo $categoria->categoria;?>" name="idCategoria">
                            <div class="form-group <?php echo !empty(form_error("nombre"))? 'has-error':''; ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo !empty(form_error("nombre"))? set_value("nombre"): $categoria->nombre;?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>"); ?>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion?>">
                            </div>
                            <div class="forn-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a class="btn btn-danger btn-flat" href="<?php echo base_url();?>mantenimiento/categorias">Cancelar</a>
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