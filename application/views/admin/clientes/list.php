
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Clientes
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
                                <a href="<?php echo base_url();?>mantenimiento/clientes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Clietes</a>
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
                                                <th>Telefono</th>
                                                <th>Direccion</th>
                                                <th>NIT</th>
                                                <th>Empresa</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php if(!empty($clientes)): ?>
                                                <?php foreach ($clientes as $cliente):?>
                                                    <tr>
                                                        <td><?php echo $cliente->cliente;?></td>
                                                        <td><?php echo $cliente->nombre;?></td>
                                                        <td><?php echo $cliente->apellido;?></td>
                                                        <td><?php echo $cliente->telefono;?></td>
                                                        <td><?php echo $cliente->direccion;?></td>
                                                        <td><?php echo $cliente->nit;?></td>
                                                        <td><?php echo $cliente->empresa;?></td>
                                                        <?php $datacliente = $cliente->cliente."*".$cliente->nit."*".$cliente->nombre."*".$cliente->apellido."*".$cliente->direccion."*".$cliente->telefono."*".$cliente->empresa;?>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-view-cliente" data-toggle='modal' data-target='#modal-default' value="<?php echo $datacliente;?>">
                                                                        <span class="fa fa-eye"></span>
                                                                </button>
                                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/edit/<?php echo $cliente->cliente?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/delete/<?php echo $cliente->cliente?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
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
