<?php
$tutoreos = Tutoreo::model()->findAll(array('order'=>'fecha desc', 
											'condition'=>'maestroMateriaGrupo_aid = :x && alumno_aid = :z', 
											'params'=>array(':x'=>$_GET['maesmatgru'],':z' => $_GET['al'])));
$materiaMaestro = MateriaMaestro::model()->find('id = ' . $_GET['maesmatgru']);
$this->pageCaption='Alumno: ' . $tutoreos[0]->alumno->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="Maestro : " . $materiaMaestro->maestro->nombre . " Materia: " . $materiaMaestro->materia->nombre;
$this->breadcrumbs=array(
	'Maestro',
	'Materia',
	'Grupo',
	$tutoreos[0]->alumno->nombre
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>"javascript:history.go(-1)"),
);
?>

<?php
//Materias por maestro
?>

<table class="table table-bordered table-striped">
	<thead class="thead">
		<tr>
			<td><b>Acciones</b></td>		
			<td><b>Semana</b></td>
			<td><b>Fecha</b></td>			
			<td><b>Faltas</b></td>
			<td><b>No Tareas</b></td>
			<td><b>Conducta</b></td>
			<td><b>Observaciones</b></td>
		</tr>
	</thead>
	<tbody>	
	<?php foreach ($tutoreos as $valor) { 
		//echo '<pre>'; print_r($valor); echo '</pre>';
		//exit;?>
		<tr>
			<td><?php echo CHtml::link('Actualizar',array('tutoreo/update',
                                         'id'=>$valor->id, 'semana_did' => $valor->semana_did, 'alumno_aid' => $valor->alumno_aid, 'maesmatgru' => $_GET['maesmatgru'])); ?></td>
			<td><?php echo $valor->semana->nombre; ?></td>
			<td><?php echo $valor->fecha; ?></td>			
			<td><?php echo $valor->faltas; ?></td>
			<td><?php echo $valor->tareasNoEntregadas; ?></td>
			<td><?php echo $valor->conducta->nombre; ?></td>
			<td><?php echo $valor->observaciones; ?></td>
		</tr>
	<?php }	?>
	</tbody>
</table>