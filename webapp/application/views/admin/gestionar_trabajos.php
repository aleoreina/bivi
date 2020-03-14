
<div id="body">

<div class="container" align="center" >
<h1>Archivos <?php if(isset($puedes_registrar)) { if ($puedes_registrar == true) {  ?> <a href="<?php echo base_url(); ?>admin/gestionar/archivos/agregar" class="btn btn-success">Añadir</a> <?php } } ?></h1>
<h4>Gestiona los diferentes archivos de la biblioteca</h4>


    <?php if (isset($error)) {  ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    <?php } else {  ?>



<br><br>
<table class="table table-hover" style="font-size: 12px; width: 90%; margin: 0 auto; margin-top: 15px;">
    <thead>
      <tr>
        <th>Año</th>     
        <th>Categoria</th>
        <th>Titulo</th>

        <th>Carrera / Especialidad</th>
        <th>Autores</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <?php 





    for ($i = $start_busqueda; $i <= $end_busqueda; $i++) {
     ?>
    <tbody>
      <tr>
               <td><?php echo ($trabajos_disponibles[$i]->anio);?></td>       

        <td><?php echo ($trabajos_disponibles[$i]->tipo_de_trabajo);?></td>
        <td style="width: 30%;"><?php echo ($trabajos_disponibles[$i]->titulo);?></td>
        <td><?php echo ($trabajos_disponibles[$i]->carrera);?></td>
        <td><?php echo ($trabajos_disponibles[$i]->autores);?></td>
        <td>
        <?= form_open() ?>
  <button type="submit" name="eliminar_trabajo" value="<?php echo ($trabajos_disponibles[$i]->id); ?> " class="btn btn-danger">Eliminar</button>

        </form>
         </td>
      </tr>
  <?php }  }; ?>
    </tbody>
  </table>

<?php 

if (isset($end_busqueda)) {

if ($total_trabajos > $end_busqueda + 1 && $total_trabajos-$end_busqueda != 0) {


?>
<?= form_open() ?>
 <button type="submit" name="contador_desde_pagina" value=" <?php echo ($end_busqueda); ?> " class="btn btn-primary">Ir a Proximos registros</button>


</form>
  <?php 



}}
?>

</div>
</div>