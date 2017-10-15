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
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
$(document).ready(function () {
    var base_url = "<?php echo base_url();?>";
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
$('.sidebar-menu').tree()
})
</script>
</body>
</html>