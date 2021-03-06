
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Ventas
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
                    <a href="<?php echo base_url();?>movimientos/ventas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Venta</a>
                    <?php endif;?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">                                    
                        <table id='example1' class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del cliente</th>
                                    <th>Tipo de comprobante</th>
                                    <th>Nuemero del comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php if(!empty($ventas)):?>
                                    <?php foreach($ventas as $venta):?>
                                        <tr>
                                            <td><?php echo $venta->venta;?></td>
                                            <td><?php echo $venta->cliente;?></td>
                                            <td><?php echo $venta->tipoComprobante;?></td>
                                            <td><?php echo $venta->num_documento;?></td>
                                            <td><?php echo $venta->fecha;?></td>
                                            <td><?php echo $venta->total;?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-view-venta" value="<?php echo $venta->venta;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
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
    <h4 class="modal-title">Informacion de la venta</h4>
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
