
<div id="body">
	<div style="margin-top: 5%; padding-bottom:  20px;" align="center">
	<img  height="15%"  src="<?php echo base_url(); ?>assets/themes/default/images/BIVI_grand_logo.png" />

	</div>
		<h3 align="center">De investigacion y produccion intelectual</h3>
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
<div class="form-inline" align="center">
 <div class="form-group" >

</div>
 <div class="form-group" style="width: 40%;">
  <label for="tipo_de_trabajo">Consulta:</label>
      <input type="text" style="width: 80%;" name="campo_consulta" value="<?php if(isset($_POST['campo_consulta'])) { echo $_POST['campo_consulta']; } ?>"  id="campo_consulta" class="form-control" placeholder="Escribe tu consulta aqui" >
 </div>

 <div class="form-group" >
 <label for="tipo_de_trabajo"> - Categoria</label>
<select id="tipo_de_trabajo" name="tipo_de_trabajo_consulta" value="<?php if(!empty($_POST['tipo_de_trabajo_consulta'])) { echo $_POST['tipo_de_trabajo_consulta']; } ?> <?php if(!isset($_POST['tipo_de_trabajo_consulta'])) { echo "selected"; } ?>"  class="form-control">
<?php if(isset($_POST['tipo_de_trabajo_consulta'])) { ?> 
<option><?php if(isset($_POST['tipo_de_trabajo_consulta'])) { echo $_POST['tipo_de_trabajo_consulta']; } ?></option>
<?php } ?>
<?php foreach ($tipo_de_trabajos as $tipos_de_trabajo_target) {
  if ($tipos_de_trabajo_target->tipo_de_trabajo ==  $_POST['tipo_de_trabajo_consulta']) { continue; }
?>
  <option><?php echo ($tipos_de_trabajo_target->tipo_de_trabajo);?></option>
<?php }?>
<option <?php if(!isset($_POST['tipo_de_trabajo_consulta'])) { echo "selected"; } ?> >- CUALQUIERA -</option>
</select>
 </div>
  <div class="form-group">
       <label for="anio_element"> - Año</label>

 <select id="anio_element" name="anio_consulta"  value="<?php if(!empty($_POST['anio_consulta'])) { echo $_POST['anio_consulta']; } ?>" class="form-control" >
 <option><?php if (isset($_POST['anio_consulta'])) { echo $_POST['anio_consulta']; }?></option>
<?php foreach ($anio_trabajos as $anio_target) {
    if ($anio_target->anio == $_POST['anio_consulta']) { continue; }

?>
  <option><?php echo ($anio_target->anio);?></option>

<?php }?>
<option <?php if(!isset($_POST['anio_consulta'])) { echo "selected"; } ?> >- CUALQUIERA -</option>
</select>
</div>
<button type="submit" class="btn btn-primary">Buscar</button>
</div>
</div>
</form>
<br>
<br>
</div>
