
  <div class="form-inline">
  <div class="form-group" style="float: left;  text-align: left;">

 <label for="tipos_de_trabajos">Categoria</label>
<select id="tipos_de_trabajos" name="tipos_de_trabajos_consulta" value=""  class="form-control">


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
    <input type="AUTORES" name="AUTORES" style="text-align: left;" class="form-control" id="AUTORES" style="width: 1;" placeholder="EJ: ANGEL R.,DIOGENES Y., YHON P." onkeyup="this.value = this.value.toUpperCase();">
  </div>

   <div class="form-group" style=" margin-top: 10px; text-align: center; width: 100%;">

    <label for="Titulo_del_trabajo">CARRERA / ESPECIALIDAD</label>
    <input type="text" style="text-align: left;" class="form-control" id="CARRERA" name="CARRERA" style="width: 1;" placeholder="EJ: SEGURIDAD EN ELECTRICIDAD INDUSTRIAL" onkeyup="this.value = this.value.toUpperCase();">
  </div>
      <label for="subir_archivo">ADJUTAR DOCUMENTO</label>
<div id="form-group" style="background:  #FFF; padding: 50px; color: #333;">

 <input type="file" name="trabajo_de_grado_pdf" size="20" />
     <label style=" text-align: center;"for="subir_archivo"><br>Solo se admite archivos PDF con un maximo de 10MB </label>
</div>
<br><br><br>
