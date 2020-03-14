<html lang="en">
	<head>
		<title>BIVI - Panel de Administrador</title>
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
	<?php
	/** -- Copy from here -- */
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t";

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	} echo "\n\t";

	/** -- to here -- */
?>

   
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/images/favicon.png" type="image/x-icon"/>

	
</head>

  <body>


<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/themes/default/images/logo.png"></img></a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url(); ?>admin">RESUMEN</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          GESTIONAR <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>./admin/gestionar/archivos">Archivos</a></li>
          <li><a href="<?php echo base_url(); ?>./admin/gestionar/categorias">Categorias</a></li>

        </ul>


      </li>
      


    </ul>
 

 
 <?php if(!isset($_SESSION['usuario']) ) { ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url(); ?>conectarse">Iniciar Sesion</a></li>
    </ul>
<?php } else {  ?>

    <ul class="nav navbar-nav navbar-right">
    <li><a>Hola, <?php echo $_SESSION['usuario']; ?></a></li>
      <li><a href="<?php echo base_url(); ?>desconectarse">Desconectarse</a></li>
    </ul>   
<?php } ?>
  </div>
</nav>



    <div class="container">


    <?php if($this->load->get_section('text_header') != '') { ?>
    	<h1><?php echo $this->load->get_section('text_header');?></h1>
    <?php }?>
    <div class="row">
	    <?php echo $output;?>
		<?php echo $this->load->get_section('sidebar'); ?>
    </div>
      <hr/>

      <footer><P align="center" ><b>BIVI</b></P></div>
      </footer>

    </div> <!-- /container -->
</body></html>
