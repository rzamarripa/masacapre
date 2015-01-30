<?php
$this->pageCaption='Ver AlumnosGrupo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Alumnos Grupo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Alumnos Grupo', 'url'=>array('index')),
	array('label'=>'Crear AlumnosGrupo', 'url'=>array('create')),
	array('label'=>'Actualizar AlumnosGrupo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar AlumnosGrupo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Alumnos Grupo', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'alumno_aid',
		        'value'=>$model->alumno->nombre,),
		array(	'name'=>'grupo_aid',
		        'value'=>$model->grupo->nombre,),
	),
)); ?>
