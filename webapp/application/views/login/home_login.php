
<div id="body">

 <br>
<br>

	<div style="margin-top: 1%; padding-bottom:  1px;" align="center">

		<h2 align="center">Inicie sesion</h2>
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
	</div>

<?= form_open() ?>
<div class="text-center" padding:0px 0">
	<div class="login-form-1" style="  padding: 20px; border: 1px solid #DCDCDC; padding: 4px;" >
			<div class="login-form-main-message"><</div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="username" class="sr-only">Usuario</label>
						<input type="text" class="form-control" id="username" name="usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Contraseña</label>
						<input type="password" class="form-control" id="password" name="clave" placeholder="Contraseña">
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right">OK</i></button>
			</div>

<div align="center">
	
	<?php echo $widget;?>
<?php echo $script;?>
</div>

	</form>
	</div>

</div>



 <br>
<br>



  </div>


