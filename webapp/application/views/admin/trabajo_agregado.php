
<div id="body">
<div class="container" align="center" >

<h1>Se ha registrado satisfactoriamente el trabajo.</h1>
<br>



<p class="bg-success" style="color: #333;  font-size: 16px;  text-align: left; padding: 25px; "><b>Titulo: </b>  <?php echo $titulo_del_trabajo; ?> <br>

<b>Categoria:</b> <?php echo $categoria; ?> <br>

<b>Año: </b><?php echo $anio; ?> <br>

<b>Carrera: </b><?php echo $carrera; ?> <br>

<b>Identificacion: </b><?php echo $nombre_del_archivo; ?> <br>

<b>URL del PDF: </b> <?php echo base_url() . "documentos/" . $nombre_del_archivo; ?>

</p>


</div>
</div>