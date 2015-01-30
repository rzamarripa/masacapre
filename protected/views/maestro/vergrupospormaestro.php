<?php
$connection = Yii::app()->db;
$materiaMaestro = MateriaMaestro::model()->find('id = :g', array(':g' => $_GET['maesmatgru']));
//echo '<pre>';print_r($materiaMaestro->attributes); echo "</pre>";
//exit;
$grupos = MateriaMaestro::model()->findAll('maestro_aid = :x && materia_aid = :y && estatus_did = 1', 
				array(':x'=>$materiaMaestro->maestro_aid, ':y' => $materiaMaestro->materia_aid));
$usuarioActual = Usuario::model()->find('usuario = :u', array(':u' => Yii::app()->user->name));

$this->pageCaption='Materia: ' . $materiaMaestro->materia->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	$materiaMaestro->materia->nombre =>Yii::app()->user->returnUrl,
	'Mis Grupos',
);

$this->menu=array(
	array('label'=>'Volver a mis materias', 'url'=>Yii::app()->user->returnUrl),
);
?>
	<div class="well">
		<table class="table table-bordered">
			<thead class="thead">
				<tr>
					<td style="width:50px; text-align: center;"><span class="label label-success">Verde</span></td>
					<td style="width:50px; text-align: center;"><span class="label label-warning">Naranja</span></td>
					<td style="width:50px; text-align: center;"><span class="label label-important">Rojo</span></td>
				</tr>		
			</thead>
			<tbody>
				<tr>
					<td style="text-align: center;">Realizado</td>
					<td style="text-align: center;">En proceso</td>
					<td style="text-align: center;">No realizado</td>						
				</tr>
			</tbody>
		</table>
	</div>

		

		<table class="table table-bordered table-striped">
			<thead class="thead">
				<tr>		
					<td><b>Grupo</b></td>
					<td><b>Sem 1</b></td>	
					<td><b>Sem 2</b></td>
					<td><b>Sem 3</b></td>	
					<td><b>Sem 4</b></td>
					<td><b>Sem 5</b></td>	
					<td><b>Sem 6</b></td>
					<td><b>Sem 7</b></td>	
					<td><b>Sem 8</b></td>
					<td><b>Sem 9</b></td>	
					<td><b>Sem 10</b></td>
					<td><b>Sem 11</b></td>	
					<td><b>Sem 12</b></td>
					<td><b>Sem 13</b></td>	
					<td><b>Sem 14</b></td>
					<td><b>Sem 15</b></td>	
					<td><b>Sem 16</b></td>
					<td><b>Sem 17</b></td>
					<td><b>Sem 18</b></td>	
				</tr>
			</thead>
			<tbody>	
			<?php
				foreach ($grupos as $grupo) {					
					$semanas = Semana::model()->findAll('ciclo_did = :c && semestre_did = :s', array(':c'=>$materiaMaestro->grupo->ciclo_did,':s'=>$materiaMaestro->grupo->semestre_did));
					
					$totalAlumnosGrupo = AlumnosGrupo::model()->Count('grupo_aid = :x', array(':x'=>$materiaMaestro->grupo_did));					
					echo '<tr>';
					echo '<td>' . CHtml::link(	$grupo->grupo->nombre, 
														array('maestro/veralumnosporgrupo', 
															'maesmatgru' => $_GET['maesmatgru'], 'grupo' => $grupo->grupo_did)) .
						'</td>';
					foreach ($semanas as $semana)
					{
						$totalAlumnosTutoreo = Tutoreo::model()->Count('maestroMateriaGrupo_aid = :y && semana_did = :z', array(':y' => $_GET['maesmatgru'], ':z' => $semana->id));
						if($semana->estatus->nombre == 'Activo')
						{
							echo '<td>';
								echo '<i class="icon-ok"></i>';
								if($totalAlumnosGrupo == $totalAlumnosTutoreo)	
								{	
									$porcentaje = ($totalAlumnosTutoreo / $totalAlumnosGrupo) * 100;								
									echo CHtml::link('<i class="icon-signal">', 
														array('maestro/vertutoreoporgrupo', 
															'maesmatgru' => $_GET['maesmatgru'],
															'semana_did'=> $semana->id,
															'grupo' => $grupo->grupo_did
															),
														array('class'=>'label label-success semana',
															'rel'=>'popover',
															'data-content' => '<b>Total de Alumnos:</b> ' . 
																				$totalAlumnosGrupo . 
																				'</br> <b>Alumnos con Tutoreo:</b> ' . 
																				$totalAlumnosTutoreo,
															'data-original-title' => 'Avance <b>' . number_format($porcentaje, 0) . 
																				'%</b>',
														));
								}
								else if($totalAlumnosTutoreo != 0){
									$porcentaje = ($totalAlumnosTutoreo / $totalAlumnosGrupo) * 100;	
									echo CHtml::link('<i class="icon-signal">', 
														array('maestro/vertutoreoporgrupo', 
															'maesmatgru' => $_GET['maesmatgru'],
															'semana_did'=> $semana->id,
															'grupo' => $grupo->grupo_did
															),
														array('class'=>'label label-warning semana',
															'rel'=>'popover',
															'data-content' => '<b>Total de Alumnos:</b> ' . 
																				$totalAlumnosGrupo . 
																				'</br> <b>Alumnos con Tutoreo:</b> ' . 
																				$totalAlumnosTutoreo,
															'data-original-title' => 'Avance <b>' . number_format($porcentaje, 0) . 
																				'%</b>',
														));
								}
								else									
									echo CHtml::link('<span class="label label-important"><i class="icon-calendar"></i></span>', 
														array('maestro/vertutoreoporgrupo',
															'maesmatgru' => $_GET['maesmatgru'],
															'semana_did'=> $semana->id,
															'grupo' => $grupo->grupo_did
															),
														array('class'=>'semana',
															'rel'=>'popover',
															'data-content' => '<b>Total de Alumnos:</b> ' . 
																				$totalAlumnosGrupo . 
																				'</br> <b>Alumnos con Tutoreo:</b> ' . 
																				$totalAlumnosTutoreo,
															'data-original-title' => 'Avance 0%</b>',
														));
							echo '</td>';
						}
						else
						{
							echo '<td>';
							echo '<i class="icon-ban-circle"></i>';
							if($totalAlumnosGrupo == $totalAlumnosTutoreo)
							{
								$porcentaje = ($totalAlumnosTutoreo / $totalAlumnosGrupo) * 100;								
								echo CHtml::link('<i class="icon-signal">', 
													array('maestro/vertutoreoporgrupo', 
														'maesmatgru' => $_GET['maesmatgru'],
														'semana_did'=> $semana->id,
														'grupo' => $grupo->grupo_did
														),
													array('class'=>'label label-success semana',
														'rel'=>'popover',
														'data-content' => '<b>Total de Alumnos:</b> ' . 
																			$totalAlumnosGrupo . 
																			'</br> <b>Alumnos con Tutoreo:</b> ' . 
																			$totalAlumnosTutoreo,
														'data-original-title' => 'Avance <b>' . number_format($porcentaje, 0) . 
																			'%</b>',
													));
							}
							else if($totalAlumnosTutoreo != 0)
							{
								$porcentaje = ($totalAlumnosTutoreo / $totalAlumnosGrupo) * 100;	
								echo CHtml::link('<i class="icon-signal">', 
														array('maestro/vertutoreoporgrupo', 
															'maesmatgru' => $_GET['maesmatgru'],
															'semana_did'=> $semana->id,
															'grupo' => $grupo->grupo_did
															),
														array('class'=>'label label-warning semana',
															'rel'=>'popover',
															'data-content' => '<b>Total de Alumnos:</b> ' . 
																				$totalAlumnosGrupo . 
																				'</br> <b>Alumnos con Tutoreo:</b> ' . 
																				$totalAlumnosTutoreo,
															'data-original-title' => 'Avance <b>' . number_format($porcentaje, 0) . 
																				'%</b>',
														));
							}
							else if($semana->fechaInicial_f > date('Y-m-d'))
								echo "<span class='semana' rel='popover' data-content = 'Esta semana todavía no se encuentra habilitada, 
															si cree que es un error del sistema por favor de revisarlo con el <br/>
															<b>Coordinador de Prepa</b>. <br/> 
															<b>Nombre:</b> Alberto Tostado <br/> 
															<b>Tel:</b> 7612612 ext. 204.',
										data-original-title = 'Espere la fecha'><i class='icon-calendar'></span>";
							else
								echo "<span class='label label-important semana' rel='popover',
										data-content = 'Es semana se ha cerrado, usted no puede capturar una semana que se ha cerrado, 
															si cree que es un error del sistema por favor de revisarlo con el <br/>
															<b>Coordinador de Prepa</b>. <br/> 
															<b>Nombre:</b> Alberto Tostado <br/> 
															<b>Tel:</b> 7612612 ext. 204.',
										data-original-title = 'Semana cerrada'>
											<i class='icon-calendar'>
										</span>";
							echo '</td>';
						}
					}
					echo '</tr>';
				}	?>
			</tbody>
		</table>
<script>  
	$(function ()  
	{ 
		$(".semana").popover({title: 'Avance', content: "Contenido"});  
	});  
</script>  
