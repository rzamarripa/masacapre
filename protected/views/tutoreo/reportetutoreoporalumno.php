<?php
$this->pageCaption='Alumno: ' . $_GET['alumnoNombre'];
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	'Mis Materias',
);
?>

<?php
//Materias por maestro
$tutoreos = Tutoreo::model()->findAll('maestroMateriaGrupo_aid = ' . $_GET['maesmatgru']);
echo '<pre>'; print_r($tutoreos); echo '</pre>';
?>

<table class="table table-bordered table-striped">
	<thead class="thead">
		<tr>
			<td><b>Materia</b></td>
			<td><b>Faltas</b></td>	
			<td><b>No Tareas</b></td>		
			<td><b>Conducta</b></td>		
			<td><b>Observaciones</b></td>		
		</tr>
	</thead>
	<tbody>	
	<?php foreach ($tutoreos as $valor) 	{ 
		//echo '<pre>'; print_r($valor); echo '</pre>';
		//exit;?>
		<tr>			
			<td><?php echo $valor->maestroMateriaGrupo->materia->nombre; ?></td>			
			<td><?php echo $valor->faltas; ?></td>
			<td><?php echo $valor->tareasNoEntregadas; ?></td>
			<td><?php echo $valor->conducta->nombre; ?></td>
			<td><?php echo $valor->observaciones; ?></td>
		</tr>
	<?php }	?>
	</tbody>
</table>