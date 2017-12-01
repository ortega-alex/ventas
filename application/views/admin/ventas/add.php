<!--conten wapers-->
<div class="content-wrapper">
	<!--contet header(page header)-->
	<section class="content-header">
		<h1>
			Ventas
			<small>nuevo</small>
		</h1>
	</section>
	<!--mail content-->
	<section class="content">
		<!--default box-->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<form action="<?php echo base_url();?>movimientos/ventas/store" method="POST" class="form-horizontal">
							<div class="form-group">
								<div class="col-md-3">
									<label for="">Comprobante:</label>
									<select name="comprobante" id="comprobante" class="form-control" required>
										<option value="">Seleccione una opcion</option>
										<?php foreach($tipoComprobantes as $tipoComprobante):?>
											<?php $dataComprobante = $tipoComprobante->tipo_comprobante.'*'.$tipoComprobante->cantidad.'*'.$tipoComprobante->igv.'*'.$tipoComprobante->serie;?>
											<option value="<?php echo $dataComprobante?>"><?php echo $tipoComprobante->nombre?></option>
										<?php endforeach;?>	
									</select>
									<input type="hidden" id="idcomprobante" name="idcomprobante">
									<input type="hidden" name="igv" id="igv">
								</div>
								<div class="col-md-3">
									<label for="">Serie:</label>
									<input type="text" id="serie" name="serie" required class="form-control" readonly>
								</div>
								<div class="col-md-3">
									<label for="">Numero:</label>
									<input type="text" id="numero" name="numero" required class="form-control" readonly>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>