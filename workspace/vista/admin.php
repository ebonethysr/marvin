<?php
session_start();
if(isset($_SESSION['empleado'])){
    $usuario = $_SESSION['empleado'];
    
     include '../modelo/conexion.php';
     
     $mostrar = new Conexion();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Administrador</title>
		
		<!-- Force IE to turn off past version compatibility mode and use current version mode -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
		
		<!-- Get the width of the users display-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Text encoded as UTF-8 -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  
		<!-- icons -->
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
				
		<!-- bootstrap -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="default">
		
		<!-- theme -->
		<link href="https://netdna.bootstrapcdn.com/bootswatch/3.1.0/bootstrap/bootstrap.min.css" rel="stylesheet" title="theme">
        
        
    	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries in IE8, IE9 -->
		<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
		<![endif]-->
	</head>
	
<center>
<table width="960px" id="TixManagementContent" class="TixManagementContent">
<tbody>
<tr>
<td align="left">
<div class="boxed-page">

 
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bienvenido - <?php echo $usuario->usuario;?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>

<table class="table table-condensed">
    <thead>
        <th>#</th>
        <th>Laboratorio</th>
        <th>Fecha</th>
        <th>Hora de Inicio</th>
        <th>Hora de Salida</th>
    </thead>
    <?php
        $mostrar->conectar();
        $mostrar->mostrarAdmin();
        $mostrar->cerrar();
    ?>
</table>

</body>
</html>

<?php
}else{
    echo 'NO estas autorizado para hacer esto...';
}

?>  <body>