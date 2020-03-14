
<div id="body">
<div class="container" align="center" >
<h1>Categorias</h1>
				<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
	
<h4>Por favor ingrese el nombre de la categoria</h4>
<?= form_open() ?>
	<div class="form-inline">
		 <div class="form-group" >
			<input type="text" name="categoria_a_agregar" class="form-control" onkeyup="this.value = this.value.toUpperCase();" placeholder="Ej: Trabajo de grado" />
		</div>
		<button type="submit" class="btn btn-primary">Añadir</button>
	</div>
</form>

</div>
<br>

<br>

<br>
</div>