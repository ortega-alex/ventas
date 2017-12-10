
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
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
                        <a href="<?php echo base_url();?>administrador/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar usuario</a>
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
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>User</th>
                                        <th>Roll</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php if(!empty($usuarios)): ?>
                                        <?php foreach ($usuarios as $usuario):?>
                                            <tr>
                                                <td><?php echo $usuario->usuario;?></td>
                                                <td><?php echo $usuario->nombre;?></td>
                                                <td><?php echo $usuario->apellido;?></td>                          
                                                <td><?php echo $usuario->email;?></td>
                                                <td><?php echo $usuario->username;?></td>
                                                <td><?php echo $usuario->roll;?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-view-usurios" data-toggle='modal' data-target='#modal-default' value="<?php echo $usuario->usuario;?>">
                                                                <span class="fa fa-eye"></span>
                                                        </button>
                                                        <?php if($permisos->update == 1):?>
                                                            <a href="<?php echo base_url();?>administrador/usuarios/edit/<?php echo $usuario->usuario?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                        <?php endif;?>
                                                        <?php if($permisos->delete == 1):?>
                                                            <a href="<?php echo base_url();?>administrador/usuarios/delete/<?php echo $usuario->usuario?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
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
        <h4 class="modal-title">Informacion de la Usuario</h4>
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
