        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2014-2017 <a href=#>Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!--datatable-->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<!--jquery-ui-->
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!--jquery-print-->
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<script>
$(document).ready(function () {
    var base_url = "<?php echo base_url();?>";
      $(".btn-view-producto").on("click",function(){
        var producto = $(this).val();
        //alert(cliente);
        var infoproducto = producto.split("*");
        html = "<p><strong>Codigo:</strong>"+infoproducto[1]+"</p>";
        html += "<p><strong>Nombre:</strong>"+infoproducto[2]+"</p>";
        html += "<p><strong>Descripcion:</strong>"+infoproducto[3]+"</p>";
        html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>";
        html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>";
        html += "<p><strong>Categoria:</strong>"+infoproducto[6]+"</p>";
         $("#modal-default .modal-body").html(html);
    });

    $(".btn-view-cliente").on("click",function(){
        var cliente = $(this).val();
        //alert(cliente);
        var infocliente = cliente.split("*");        
        html = "<p><strong>Nombre:</strong>"+infocliente[1]+"</p>";
        html += "<p><strong>Tipo Cliente:</strong>"+infocliente[2]+"</p>";
        html += "<p><strong>Tipo Documento:</strong>"+infocliente[3]+"</p>";
        html += "<p><strong>Direccion:</strong>"+infocliente[4]+"</p>";
        html += "<p><strong>Telefono:</strong>"+infocliente[5]+"</p>";
        html += "<p><strong>Numero de Documento:</strong>"+infocliente[6]+"</p>";
         $("#modal-default .modal-body").html(html);
    });
    $(".btn-remove").on("click",function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
       $.ajax({
        url: ruta,
        type:"POST",
        success:function(resp){
            //http://localhost/ventas_ci/mantenimiento/categorias
            window.location.href = base_url + resp;
            //alert(rep);
        }
       });
    });

    $(".btn-view").on("click",function(){     
        var id = $(this).val();
        $.ajax({
            url: base_url + 'mantenimiento/categorias/view/' + id,
            type:'POST',
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });
    });
	$('#example1').DataTable();
    $('.sidebar-menu').tree();
    $("#comprobante").on("change",function(){
        opcion = $(this).val();
        if (opcion != "") {
            comprobante = opcion.split("*");
            $("#idcomprobante").val(comprobante[0]);
            $("#igv").val(comprobante[2]);
            $("#serie").val(comprobante[3]);
            $("#numero").val(generarNumero(comprobante[1]));            
        }else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
    });

    $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split('*');
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });

    $("#producto").autocomplete({
        source:function(request,response){
            $.ajax({
                url: '<?php echo base_url();?>movimientos/ventas/getProductos',
                type: 'POST',
                dataType: 'json',
                data:{nombre:request.term},
                success:function(data){
                    response(data);
                }
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            });
                      
        },
        minLength:2,
        select:function(event,ui){
            data = ui.item.id+"*"+ui.item.codigo+"*"+ui.item.label+"*"+ui.item.precio+"*"+ui.item.stock;
            $("#btn-agregar").val(data);
        },
    });

    $("#btn-agregar").on("click",function(){
       data = $(this).val();
       if(data != ''){
            infoProducto = data.split('*');
            html = '<tr>';
            html += '<td><input type="hidden" name="idProducto[]" value="'+infoProducto[0]+'">'+infoProducto[1]+'</td>';
            html += '<td>'+infoProducto[1]+'</td>';
            html += '<td><input type="hidden" name="precio[]" value="'+infoProducto[3]+'">'+infoProducto[3]+'</td>';
            html += '<td>'+infoProducto[4]+'</td>';
            html += '<td><input type="text" name="cantidades[]" value="1" class="cantidades"></td>';
            html += '<td><input type="hidden" name="importe[]" value="'+infoProducto[3]+'"><p>'+infoProducto[3]+'</p></td>';
            html += '<td><button type="button" class="btn btn-danger btn-remove-producto"><span class="fa fa-remove"></span></td>';    
            html += '</tr>';
            $("#tbventas tbody").append(html);
            sumar();
            $("#btn-agregar").val(null);
            $("#producto").val(null);
       }else{
            alert("Seleccione un producto.....");
       }       
    });

    $(document).on("click",".btn-remove-producto",function(){
        $(this).closest('tr').remove();
        sumar();
    });


    $(document).on("keyup","#tbventas input.cantidades",function(){
        cantidad = $(this).val();
        precio = $(this).closest('tr').find('td:eq(2)').text();
        importe = cantidad * precio;
        $(this).closest('tr').find('td:eq(5)').children('p').text(importe.toFixed(2));
        $(this).closest('tr').find('td:eq(5)').children('input').val(importe.toFixed(2));
        sumar();
    });

    $(document).on("click",".btn-view-venta",function(){
        id_venta = $(this).val();
        $.ajax({
            url: base_url+'movimientos/ventas/view',
            type: 'POST',
            dataType: 'html',
            data:{id:id_venta},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });              
    });

    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print(
            {
                title:"Comprobante de venta"
            }
        );
    });
})

function generarNumero(numero){
    if (numero >= 99999 && numero < 999999) {
        return Number(numero)+1
    }
    if (numero >= 9999 && numero < 99999) {
        return "0"+(Number(numero)+1)
    }
    if (numero >= 999 && numero < 9999) {
        return "00"+(Number(numero)+1)
    }
    if (numero >= 99 && numero < 999) {
        return "000"+(Number(numero)+1)
    }
    if (numero < 9) {
        return "0000"+(Number(numero)+1)
    }
}

function sumar(){
    subtotal = 0;
    $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find('td:eq(5)').text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    $("input[name=igv]").val(igv.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal + igv - descuento;
    $("input[name=total]").val(total.toFixed(2));
}

</script>
</body>
</html>