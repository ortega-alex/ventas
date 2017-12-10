
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Reportes
    <small>Listado</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Desde:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio :''?>">
                        </div>
                        <label for="" class="col-md-1 control-label">Hasta:</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="fechafin" value="<?php echo !empty($fechafin) ? $fechafin :''?>">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                            <a href="<?php echo base_url();?>reportes/categorias" class="btn btn-danger">Restableser</a>
                        </div>
                    </div>
                </form>
            </div><hr>
                <div class="row">
                    <div class="col-md-12">                                    
                        <table id='example' class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Categoria</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead> 
                            <tbody>
                               <?php if(!empty($categorias)): ?>
                                        <?php foreach ($categorias as $categoria):?>
                                            <tr>
                                                <td><?php echo $categoria->categoria;?></td>
                                                <td><?php echo $categoria->nombre;?></td>
                                                <td><?php echo $categoria->descripcion;?></td>
                                                <td><?php echo $categoria->fecha_alta?></td>
                                                <td>
                                                <button type="button" class="btn btn-primary btn-view" value="<?php echo $categoria->categoria;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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
    <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> Imprimir</span></button>
  </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
