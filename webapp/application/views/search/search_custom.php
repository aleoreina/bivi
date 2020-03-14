
<div id="body">

 <br>
<br>



<?= form_open() ?>
<div class="form-inline" align="center">
 <div class="form-group" >

</div>
 <div class="form-group" style="width: 40%;">
  <label for="tipo_de_trabajo">Consulta:</label>
      <input type="text" style="width: 80%;" name="campo_consulta" value='<?php if(isset($_POST['campo_consulta'])) { echo $_POST['campo_consulta']; } ?>'  id="campo_consulta" class="form-control" placeholder="Escribe aqui el titulo relacionado al trabajo" >
 </div>

 <div class="form-group" >
 <label for="tipo_de_trabajo"> - Tipo de trabajo</label>
<select id="tipo_de_trabajo" name="tipo_de_trabajo_consulta" value="<?php if(!empty($_POST['tipo_de_trabajo_consulta'])) { echo $_POST['tipo_de_trabajo_consulta']; } ?> <?php if(!isset($_POST['tipo_de_trabajo_consulta'])) { echo "selected"; } ?>"  class="form-control">
<?php if(isset($_POST['tipo_de_trabajo_consulta'])) { ?> 
<option><?php if(isset($_POST['tipo_de_trabajo_consulta'])) { echo $_POST['tipo_de_trabajo_consulta']; } ?></option>
<?php } ?>
<?php foreach ($tipo_de_trabajos as $tipos_de_trabajo_target) {
  if ($tipos_de_trabajo_target->tipo_de_trabajo ==  $_POST['tipo_de_trabajo_consulta']) { continue; }
?>
  <option><?php echo $tipos_de_trabajo_target->tipo_de_trabajo; ?></option>
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



<table class="table table-hover" style="font-size: 12px; width: 80%; margin: 0 auto; margin-top: 15px;">
    <thead>
      <tr>        
        <th>Año</th>
        <th>Titulo</th>

        <th>Carrera / Especialidad</th>
        <th>Autores</th>
        <th>Multimedia</th>
      </tr>
    </thead>
    <?php foreach ($datos_busqueda as $datos_busqueda_target) { ?>
    <tbody>
      <tr>
        <td><?php echo ($datos_busqueda_target->anio);?></td>
        <td style="width: 50%;"><?php echo ($datos_busqueda_target->titulo);?></td>
        <td><?php echo ($datos_busqueda_target->carrera);?></td>
        <td><?php echo ($datos_busqueda_target->autores);?></td>
        <td>

        <?php if (!empty($datos_busqueda_target->filename)) { ?>

         <a href="<?php base_url(); echo 'documentos/' . $datos_busqueda_target->filename; ?>"><img src="<?php base_url();?>assets/themes/default/images/pdf_icon.png " width="24" height"24" /></a>

      <?php } else { ?>

         <img src="<?php base_url();?>assets/themes/default/images/nodisponible.png" width="24" height"24" />


   <?php }?>
         </td>
      </tr>
  <?php } ?>
    </tbody>
  </table>



 <br>
<br>



  </div>


