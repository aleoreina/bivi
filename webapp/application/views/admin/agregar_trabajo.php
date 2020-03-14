
<div id="body">
<div class="container" align="center" >


<h1>Agregar Archivo</h1>
<br>


        <?php if (validation_errors()) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= validation_errors() ?>
        </div>
      </div>
      <br><br><br><br>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>

        </div>
      </div>
                <br><br><br><br>
    <?php endif; ?>
  

<div style="width: 60%; color: #fff; magin-top: 30px; padding: 50px; background: #486AB4; text-align: center; border: 1px solid #333; border-radius: 12px;">



<br>
<?php echo form_open_multipart('/admin/gestionar/archivos/agregar');?>



<div class="form-group">
    <label for="Titulo_del_trabajo">TITULO DEL ARCHIVO</label>
    <input type="text" name="titulo_del_trabajo" style="text-align: center;" class="form-control" id="Titulo_del_trabajo" placeholder="EJ: INFORME DE LAS PASANTIAS REALIZADAS EN LA EMPRESA CORPOELEC, PLANTA DEL ESTE, VALENCIA-CARABOBO" onkeyup="this.value = this.value.toUpperCase();" value="<?php if (isset($_POST['titulo_del_trabajo'])) {echo $_POST['titulo_del_trabajo']; } ?>">
  </div>
  <div class="form-inline">
  <div class="form-group" style="float: left;  text-align: left;">

 <label for="tipos_de_trabajos">Categoria</label>
<select id="tipos_de_trabajos" name="tipo_de_trabajo_agregar" value=""  class="form-control">


<?php foreach ($tipos_de_trabajos as $tipos_de_trabajo_target) { ?>
  <option align="center" style="text-align: center;"><?php echo ($tipos_de_trabajo_target->tipo_de_trabajo);?></option>
<?php }?>

</select>
  <div class="form-group" style="margin-left: 190px; float: right;">
   <label for="tipos_de_trabajos">Año</label>

<select id="anio" name="anio" value=""  class="form-control">


<?php for ($i = 2000; $i <= date('Y'); $i++) { ?>
  <option align="center" style="text-align: center;"><?php echo ($i);?></option>
<?php }?>

</select>
</div>
<br>

<br>

</div>
 </div>

 <div class="form-group" style=" margin-top: 10px; text-align: center; width: 100%;">

    <label for="Titulo_del_trabajo">AUTORES</label>
    <input type="AUTORES" name="autores" style="text-align: left;" name="autores" class="form-control" id="autores" style="width: 1;" placeholder="EJ: ANGEL R.,DIOGENES Y., YHON P." onkeyup="this.value = this.value.toUpperCase();"  value="<?php if (isset($_POST['autores'])) {echo $_POST['autores']; } ?>">
  </div>

   <div class="form-group" style=" margin-top: 10px; text-align: center; width: 100%;">

    <label for="Titulo_del_trabajo">CARRERA / ESPECIALIDAD</label>
    <input type="text" style="text-align: left;" class="form-control" id="CARRERA" name="carrera" style="width: 1;" placeholder="EJ: SEGURIDAD EN ELECTRICIDAD INDUSTRIAL" onkeyup="this.value = this.value.toUpperCase();"  value="<?php if (isset($_POST['carrera'])) {echo $_POST['carrera']; } ?>" >
  </div>
      <label for="subir_archivo">ADJUTAR DOCUMENTO</label>
<div id="form-group" style="background:  #FFF; padding: 50px; color: #333;">

<input type="file" name="trabajo_de_grado_pdf" size="20" />
     <label style=" text-align: center;"><br>Solo se admite archivos PDF con un maximo de 10MB </label>
</div>

<br><br><br>

  <button type="submit" value="sent"  class="btn btn-default">Registrar</button>
</form>
</div>
</div>
</div>