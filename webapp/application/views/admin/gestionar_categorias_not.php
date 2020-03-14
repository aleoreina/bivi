
<div id="body">

<div class="container" align="center" >
<h1>Categorias</h1>
<br>

    <?php if (isset($error)) : ?>
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    <?php endif; ?>

 <a href="<?php echo base_url(); ?>admin/gestionar/categorias" class="btn btn-primary">Regresar</a>

 </div>
</div>