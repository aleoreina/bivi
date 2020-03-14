



<div id="body">
<div class="container" align="center" >
<h1>¿Esta seguro que desea eliminar la categoria <?php echo $nombre_categoria_a_eliminar[0]->tipo_de_trabajo; ?> ? </h1>
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
	
<?= form_open() ?>
	<div class="form-inline">
		<button type="submit" name="SI_acepto" value="<?php echo $nombre_categoria_a_eliminar[0]->tipo_de_trabajo; ?>" class="btn btn-primary">SI</button>
		<button type="submit" name="NO_acepto" value="NO" class="btn btn-primary">NO</button>

	</div>
</form>

</div>
<br>

<br>

<br>
</div>