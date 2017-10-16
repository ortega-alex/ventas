
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Productos
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
                                <a href="<?php echo base_url();?>mantenimiento/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar producto</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">                                    
                                    <table id='example1' class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                                <th>Categoria</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php if(!empty($productos)): ?>
                                                <?php foreach ($productos as $producto):?>
                                                    <tr>
                                                        <td><?php echo $producto->producto;?></td>
                                                        <td><?php echo $producto->codigo;?></td>
                                                        <td><?php echo $producto->nombre;?></td>
                                                        <td><?php echo $producto->descripcion;?></td>
                                                        <td><?php echo $producto->precio;?></td>
                                                        <td><?php echo $producto->stock;?></td>
                                                        <td><?php echo $producto->categoria;?></td>
                                                        <?php $dataproducto = $producto->producto."*".$producto->codigo."*".$producto->nombre."*".$producto->descripcion."*".$producto->precio."*".$producto->stock?>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-view-cliente" data-toggle='modal' data-target='#modal-default' value="<?php echo $dataproducto;?>">
                                                                        <span class="fa fa-eye"></span>
                                                                </button>
                                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/edit/<?php echo $producto->producto?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/delete/<?php echo $producto->producto?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
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