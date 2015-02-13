<?php

function tinymce(){
	
	$script_tynymce = <<<EOT
	
			tinymce.init({
				selector:"textarea#descripcion",
				plugins: ["link paste"],
				toolbar: "undo redo | bold italic | link image",
				menubar: "edit tools table  insert",
				paste_as_text: true,
				entity_encoding : "named"
			});

EOT;
	echo $script_tynymce;
}

function mensaje_alerta($alert){
	
	$html ="";
	
	// dd($alert);
	
	if ( ! empty($alert) ) {
		
		if ($alert['estilo']) {
			$alert_estilo = $alert['estilo'];
		} else {
			$alert_estilo = 'primary';
		}
		
		if ($alert['ico']) {
			$alert_ico = '<span class="glyphicon glyphicon-' . $alert['ico'] . '" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;';
		} else {
			$alert_ico = '';
		}
		
		$html ='<div class="alert alert-' . $alert_estilo . '" role="alert">' . $alert_ico . $alert['mensaje'] . '</div>';
		
	}
	
	return $html;
		
				/*
				@if ( ! empty($alert) )
					
					<div class="alert alert-{{($alert['estilo'] ? $alert['estilo'] : 'primary')}}" role="alert"><!-- style="padding: 0.5em 1em;" -->
						{{ ($alert['is_ico'] ? '<span class="glyphicon glyphicon-' . $alert['ico'] . '" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;' : null) }}
						{{ $alert['mensage'] }}
					</div>
					
				@endif
				*/
}

function mensaje_alerta_redirect($alert_mensaje, $alert_estilo, $alert_ico){
	
	$alert_array = array(
		'mensaje' 	=> $alert_mensaje,
		'estilo' 		=> $alert_estilo,
		'ico' 		=> $alert_ico
	);
	
	return mensaje_alerta($alert_array);
	
}

function mi_fecha($la_fecha , $is_hora = false){
	
	// $fecha = date("d/m/Y h:ia", strtotime($la_fecha)-25200);
	$meses_1 = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
	
	$dia = date("d", strtotime($la_fecha));
	$mes = $meses[date('n')-1];
	$anno = date("Y", strtotime($la_fecha));
	$hora = date("h:ia", strtotime($la_fecha)-25200);
	
	if ($is_hora) {
		$fecha = "$dia/$mes/$anno $hora";
	} else {
		$fecha = "$dia/$mes/$anno";
	}
	
	return $fecha;
}





