
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Categorias
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($permisos->insert == 1):?>
                        <a href="<?php echo base_url();?>mantenimiento/categorias/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Categoria</a>
                        <?php endif;?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">                                    
                            <table id='example1' class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php if(!empty($categoria)): ?>
                                        <?php foreach ($categoria as $categorias):?>
                                            <tr>
                                                <td><?php echo $categorias->categoria;?></td>
                                                <td><?php echo $categorias->nombre;?></td>
                                                <td><?php echo $categorias->descripcion;?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-view" data-toggle='modal' data-target='#modal-default' value="<?php echo $categorias->categoria;?>">
                                                                <span class="fa fa-eye"></span>
                                                        </button>
                                                            <?php if($permisos->update == 1):?>
                                                            <a href="<?php echo base_url();?>mantenimiento/categorias/edit/<?php echo $categorias->categoria?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                            <?php endif;?>
                                                            <?php if($permisos->delete == 1):?>
                                                            <a href="<?php echo base_url();?>mantenimiento/categorias/delete/<?php echo $categorias->categoria?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                                            <?php endif;?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>                                   
                            </table>
                        </div>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categorias</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
