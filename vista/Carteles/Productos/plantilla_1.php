<!doctype html>
<?php
	$fondo_pantalla = $_GET["fondo_pantalla"];
	$foto_producto = $_GET["foto_producto"];
	$dias_oferta = $_GET["dias_oferta"];
	$oferta = $_GET["oferta"];
	$valor = $_GET["valor"];
	$texto_informativo = $_GET["texto_informativo"];
	$duracionCartel = $_GET["duracion_cartel"];
	$siguienteCartel = $_GET["siguienteCartel"];
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="expires" content="0">
 
<meta http-equiv="Cache-Control" content="no-cache">
 
<meta http-equiv="Pragma" CONTENT="no-cache">
<title>Oferta</title>
<style>
	body{
		font-family: arial;
		background-image: url("../../../fotos/fotos_fondos_carteles/<?php echo $fondo_pantalla; ?>") no-repeat center center fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
	}
	
	@media screen and (max-width: 1536px){
		#contenido{
			width: 92%; 
			height: 100%;
		}
		#textos{
			height: 100%; 
			width: 100%; 
			text-align: center;
		}
		#textos-internos{
			width: 100%; 
			height: 100%; 
			background: red; 
			color: #FFFFFF;
		}
		#dias-ofertas{
			font-size: 3em;
			display: none;
		}
		#oferta{
			font-size: 7em;
			display: none;
		}
		#valor{
			font-size: 8em;
			display: none;
		}
		#texto-informativo{
			font-size: 3em;
			display: none;
		}
	}
	
	
	@media screen and (max-width: 1024px){
		#contenido{
			width: 92%; 
			height: 100%;
		}
		#textos{
			height: 100%; 
			width: 100%; 
			text-align: center;
		}
		#textos-internos{
			width: 100%; 
			height: 100%; 
			background: red; 
			color: #FFFFFF;
		}
		#dias-ofertas{
			font-size: 2.5em;
			display: none;
		}
		#oferta{
			font-size: 6em;
			display: none;
		}
		#valor{
			font-size: 8em;
			display: none;
		}
		#texto-informativo{
			font-size: 2.5em;
			display: none;
		}
	}
	
	#foto{
		display: none;
	}
	
	
	
	div{
		/* border: inset; */
	}
	
	
	#contenido{
		margin: 4%;
	}
</style>
</head>

<body>
<table id="contenido">
	<tr>
		<td>
			<table id="textos">
				<tr style="height: 15%;">
					<td></td>
				</tr>
				<tr style="height: 40%;">
					<td>
						<table id="textos-internos">
							<tr>
								<td id="dias-ofertas"><?php echo $dias_oferta; ?></td>
							</tr>
							<tr>
								<td id="oferta"><?php echo $oferta; ?></td>
							</tr>
							<tr>
								<td id="valor"><?php echo $valor; ?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="height: 10%;">
					<td id="texto-informativo"><?php echo $texto_informativo; ?></td>
				</tr>
				<tr style="height: 35%;">
					<tr></tr>
				</tr>
			</table>
		</td>
		<td width="12%"></td>
		<td width="40%">
			<table style="width: 100%; height: 100%; text-align: center;">
				<tr width="5%">
					<td></td>
				</tr>
				<tr width="80%">
					<td>
						<img id="foto" style="width: 100%; height: 50%;" src="../../../fotos/fotos_productos/<?php echo $foto_producto; ?>"/>
					</td>
				</tr>
				<tr width="15%">
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div id="background" style="position: absolute; width: 100%; height: 100%; margin-top: 0px;"></div>
</body>
<script src="../../../plugins/jquery-ui-1.10.3/jquery-1.9.1.js"></script>
<!--<script src="../../../plugins/smartBackgroundResize-1.0-jquery.js"></script>-->
<script>
$(document).ready(function(){
	

	/*$('#background').smartBackgroundResize({

		image: "../../../fotos/fotos_fondos_carteles/"
		// relative or absolute path to background image file				

	});*/<?php /*echo $fondo_pantalla;*/ ?>
	
	var duracionPagina = <?php echo $duracionCartel; ?>;
	//var ancho = ($(window).width())-($(window).width()*0.40);
	var alto = ($(window).height()*0.8);
	//$("body").css("max-width",ancho+"px");
	$("body").css("max-height",alto+"px");
	$("#contenido").css("height",alto+"px");
	
	$( "#foto" ).fadeIn( "slow" );
	$( "#texto-informativo" ).fadeIn( "slow" );
	$("#dias-ofertas").fadeToggle(1500);
	$("#valor").fadeToggle(2000);
	$("#oferta").fadeToggle(2500);
	setInterval(function(){ efectoValor(); }, 100);
	
	setTimeout(function(){
		<?php
			$controlador = "";
			if(isset($_GET["controlador"])){
				$controlador = "../".$_GET["controlador"]."";
			}else{
				$controlador = "../controlador_carteles.php";
			}
		?>
		location.href = "<?php echo $controlador; ?>?listado=<?php echo $_GET["listado"]; ?>&siguienteCartel=<?php echo $_GET["siguienteCartel"]; ?>";
	}, duracionPagina);
});
	
function efectoValor(){
	 $('#valor').each(function() {
            $(this).animate({
                fontSize: "8.0em"
            }, 1000);
		 	
		 	$(this).animate({
                fontSize: "8.8em"
            }, 1000);  
    });
}
</script>
</html>
