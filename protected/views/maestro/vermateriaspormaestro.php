<?php
$this->pageCaption='Listado de Materias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="Asignadas";
$this->breadcrumbs=array(
	'Mis Materias',
);
?>

<?php
//Materias por maestro
$connection = Yii::app()->db;
$queryMateriasPorMaestro = 'select Maestro.id as maestroid, Materia_Maestro.id as maesmatgru, Grupo.nombre as grupo, Materia.id as matid, Materia.nombre as materia, 
							Licenciatura.nombre as nombreLic, Materia.cantidad_planeaciones as cantidad 
							from Materia_Maestro 
							inner join Materia on Materia.id = Materia_Maestro.materia_aid
							inner join Maestro on Maestro.id = Materia_Maestro.maestro_aid
							inner join Licenciatura on Licenciatura.id = Materia.licenciatura_aid
							inner join Grupo on Grupo.id = Materia_Maestro.grupo_did
							where maestro_aid =
									(select id from Maestro where usuario_did = 
										(select id from Usuario where usuario = "' . Yii::app()->user->name . '"));';
$commandMateriasPorMaestro = $connection->createCommand($queryMateriasPorMaestro);
$materiasPorMaestro = $commandMateriasPorMaestro->queryAll();
//echo '<pre>'; print_r($materias); echo '</pre>';
?>

<table class="table table-bordered table-striped">
	<thead class="thead">
		<tr >
			<td colspan="3" style="width:100px; text-align:center"><b>Acciones</b></td>
			<td style="width:110px;"><b>Materia</b></td>
			<td style="width:110px;"><b>Nivel Educativo</b></td>
			<td style="width:110px;"><b>Planeaciones Requeridas</b></td>			
		</tr>
	</thead>
	<tbody>
	<?php foreach ($materiasPorMaestro as $valor) { ?>
		<tr>
			<td style="width:150px; text-align:center;"><?php echo CHtml::link("Planeaciones", 
						array('planeacion/misplaneaciones', 
						'materia'=>$valor["materia"], 
						'matid'=>$valor["matid"], 
						'maestroid'=>$valor["maestroid"], 
						'usuario' => Yii::app()->user->name, 
						'lic'=>$valor['nombreLic'])); 
				?>
			</td>
			<td style="width:150px; text-align:center;"><?php echo CHtml::link("Tutoreo", 
						array('maestro/vergrupospormaestro', 						
						'maesmatgru'=>$valor['maesmatgru']						
						)); 
				?>
			</td>
			<td style="width:50px; text-align:center;"><?php echo CHtml::encode($valor["grupo"]); ?></td>
			<td><?php echo CHtml::encode($valor["materia"]); ?></td>
			<td><?php echo $valor["nombreLic"]; ?></td>
			<td><?php echo $valor["cantidad"]; ?></td>			
		</tr>
	<?php }	?>
	</tbody>
</table>