<?= $this->extend('layout/main') ?>
<?= $this->section('contenido') ?>
	<div class="col-md-12">
		<div class="container">
		    <div class="card m-b-30">
		    <div class="card-body">
	        <h5 class="ml-5"><b>Mantenimiento Kit Producto</b></h5>
	        <button class="btn btn-info btn-sm ml-5" onClick="$('#envio_search').trigger('reset');" data-toggle="modal" data-target="#modal_kitproducto" id="nav-profile-tab">Nuevo Kit Producto</button>
		    <button class="btn btn-danger btn-sm" id="pdf">PDF</button>
			<button class="btn btn-success btn-sm" id="xlsx">XLSX</button>
			<div class="table-responsive">
			<br>
		        <table id="datatable_kitproducto" class="table display" style="font-size: 11px; text-align:center;" >
		        	<thead>
			            <tr style="background:#eff3f6;">
						    <th scope="col">Id</th>
                            <th scope="col">Codigo</th>
							<th scope="col">Foto</th>
							<th scope="col">Nombre Kit</th>
                            <th scope="col">Familia</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Unidad Medida</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
			            </tr>
		        	</thead>
		        	<tbody id="mostrartabla"></tbody>
		        </table>
			</div>
			</div>
		    </div>
		</div>
	</div>
	<?php require '__modal.php'; ?>
	<?php require '__script.php'; ?>
<?= $this->endSection() ?>




