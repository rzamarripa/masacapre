<?php
$this->pageCaption='Seleccione la semana';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="del alumno que quiere visualizar";
$this->breadcrumbs=array(
	'Alumnos -> Semanas',
);
$semestres = Semestre::model()->findAll();
$g = 0;
?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
  	<?php
  		$activo = 'active';
  		$contadorPestana = 0;
  		foreach($semestres as $semestre)
  		{
  	?>
  		<li class="<?php if($contadorPestana == 2) 
						{
							echo $activo; 
							$activo = ''; 
						} 
						$contadorPestana++;?>"><a href="#tab<?php echo $semestre->id; ?>" data-toggle="tab"><?php echo $semestre->nombre; ?></a></li>
  	<?php
  		}
  	?>
  </ul>
  <div class="tab-content">
	<?php 		
		$activo = 'active';
		$contadorPestana = 0;
		foreach($semestres as $semestre)
		{
			$numeroSemana = 1;
    ?>
    		<div class="tab-pane <?php 
    								if($contadorPestana == 2) 
    								{
    									echo $activo; 
	    								$activo = ''; 
    								}
    									
    								$contadorPestana++;
    							?>" id="tab<?php echo $semestre->id; ?>">
    			<div class="accordion" id="accordion2">
   				<?php
   					$grupos = Grupo::model()->findAll("semestre_did = " . $semestre->id);
   					foreach($grupos as $grupo) { $g++; 
	   					$semanas = Semana::model()->findAll('semestre_did = ' . $semestre->id . ' && ciclo_did = ' . $grupo->ciclo_did);
   					?>
   					
   					<div class="accordion-group">
					    <div class="accordion-heading">
					      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $g; ?>">
					        <?php echo $grupo->nombre . ' - ' . $grupo->ciclo->nombre; ?>
					      </a>
					    </div>
					    <div id="collapse<?php echo $g; ?>" class="accordion-body collapse">
					      <div class="accordion-inner">
							  <table class="table table-bordered">
								<caption><h4>Semanas</h4></capxtion>
								<thead class="thead">
									<tr>
										<td><b>Alumno</b></td>
									<?php foreach($semanas as $semana) { ?>
											<td><b><?php echo $numeroSemana; $numeroSemana++;?></b></td>
									<?php } $numeroSemana = 1; ?>
									</tr>
								</thead>
								<tbody>
								<?php 
								
									$alumnosgrupo = AlumnosGrupo::model()->findAll("grupo_aid =  " . $grupo->id);
									foreach($alumnosgrupo as $alumnogrupo){ ?>
									<tr>
										<td>
											<?php echo CHtml::link($alumnogrupo->alumno->nombre, 
													array('alumno/view', 
														'id' => $alumnogrupo->alumno_aid,													 
														),
													array('class'=>'foto',
														'rel'=>'popover',
														'data-content' => '<img style="
																						border-style:solid;
																						border-width:3px;
																						border-color:#442B1C;
																						height:100px; 
																						width:90px; 
																						-webkit-border-radius: 3px 3px; 
																						-moz-border-radius: 3px 3px;" 
																				src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 
																						'fotos' . DIRECTORY_SEPARATOR . 
																							$alumnogrupo->alumno->foto . '" alt="' . 
																							$alumnogrupo->alumno->nombre . '" width=100 height=100/>',
														'data-original-title' => 'Foto',
														));
											?>
										</td>	
										<?php foreach($semanas as $semana){ ?>
										<td>
											<?php 							
												$comentario = Reporte::model()->find('alumno_aid = :a && semana_did = :s', 
													array(':s' => $semana->id, ':a' => $alumnogrupo->alumno_aid));
													
												if(empty($comentario))
												{																
													echo CHtml::link('s/c', 
														array('maestro/reportesemanalgenerado', 
															'alumno_did' => $alumnogrupo->alumno_aid * 23,
															'semana_did'=> $semana->id,
															'semestre_did' => $semana->semestre_did,									
														),
														array('class'=>'label label-important semana',
															'target'=>"_blank",
															'rel'=>'popover',
															'data-content' => '<strong>Alumno</strong>: ' . $alumnogrupo->alumno->nombre . '<br/>' .
																			  '<strong>Periodo</strong>: ' . $semana->nombre . '<br/>' .
																			  '<strong>Comentario</strong>: No hay comentario alguno <br/>',
															'data-original-title' => '<b>Información</b>',
														));
												}
												else
												{								
													echo CHtml::link("Si", 
														array('maestro/reportesemanal', 
															'alumno_did' => $alumnogrupo->alumno_aid,
															'semana_did'=> $semana->id,
															'reporte_id'=> $comentario->id,
															'semestre_did' => $semana->semestre_did,
														),
														array(
															'class'=>'label label-success semana',
															'rel'=>'popover',
															'data-content' => '<strong>Alumno</strong>: ' . $alumnogrupo->alumno->nombre . '<br/>' .
																			  '<strong>Periodo</strong>: ' . $semana->nombre . '<br/>' .
																			  '<strong>Comentario</strong>: ' . $comentario->comentario . '<br/>',
															'data-original-title' => '<b>Información</b>',
														));
												}
											?>
										</td>
										<?php } ?>
									</tr>
								<?php } ?>
								</tbody>
			    			</table>
					      </div>
					    </div>
					</div>     					
   				<?php } ?>				  
				</div>
			</div>
		<?php } ?>
  </div>
</div>
<script>  
	$(function ()  
	{ 
		$(".semana").popover({title: 'Avance', content: "Contenido"});  
		$(".foto").popover({title: 'Foto', content: "Contenido"});  
	});  
</script>  


