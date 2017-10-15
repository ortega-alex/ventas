
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
                                <a href="<?php echo base_url();?>mantenimiento/categorias/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Categoria</a>
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
                                            <?php if(empty($categorias)): ?>
                                                <?php foreach ($categoria as $categorias):?>
                                                    <tr>
                                                        <td><?php echo $categorias->categoria;?></td>
                                                        <td><?php echo $categorias->nombre;?></td>
                                                        <td><?php echo $categorias->descripcion;?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                    <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a>
                                                                    <a href="<?php echo base_url();?>mantenimiento/categorias/edit/<?php echo $categorias->categoria?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                                    <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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