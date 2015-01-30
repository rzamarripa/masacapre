<?php
$this->pageCaption='Cambiar alumnos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='de grupo';
$this->breadcrumbs=array(
	'Maestro',
);

$this->menu=array(
	array('label'=>'Crear Maestro', 'url'=>array('create')),
	array('label'=>'Administrar Maestro', 'url'=>array('admin')),
);
echo CHtml::dropDownList('status', '', CHtml::listData(Grupo::model()->findAll(),"id","nombre"));
?>
<table class="table table-striped table-bordered">
	<caption><h4>Listado de alumnos</h4></caption>
	<thead class="thead">
		<tr>
			<td>Sel.</td>
			<td>Alumno</td>
			<td>Grupo</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($alumnosGrupo as $ag){ ?>
		<tr>
			<td><?php echo CHtml::checkbox($ag->alumno_aid,false,array('id'=>$ag->alumno_aid,'class'=>'checkbox_class'));?></td>
			<td><?php echo $ag->alumno->nombre;?></td>
			<td><?php echo $ag->grupo->nombre;?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
