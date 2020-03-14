
<div id="body">

<div class="container" align="center" >
<h1>Categorias <a href="<?php echo base_url(); ?>admin/gestionar/categorias/agregar" class="btn btn-success">Añadir</a></h1>
<h4>Gestiona las diferentes categorias segun los diferentes tipo de trabajo</h4>



    <?php if (isset($error)) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    <?php endif; ?>    <?php if ($datos_categorias != false) { ?>
<table class="table table-hover" style="font-size: 12px; width: 45%; margin: 0 auto; margin-top: 30px;">
    <thead >
      <tr>        
        <th style="width: 50%;">Categoria</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <?php foreach ($datos_categorias as $datos_categorias_target) { ?>
    <tbody>
      <tr>
      <?= form_open() ?>
        <td><?php echo ($datos_categorias_target->tipo_de_trabajo);?></td>
        <td><button type="submit" style="margin-left: 10px;" class="btn btn-danger" name="Eliminar_cat" value="<?php echo $datos_categorias_target->id; ?>">Eliminar</button></td>
      </tr>
      </form>
  <?php } }?>
    </tbody>
    </table>


      </div>
<br>

<br>
<br>
</div>