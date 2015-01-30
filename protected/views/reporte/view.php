<?php
$this->pageCaption='Ver Reporte #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Reporte'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Reporte', 'url'=>array('index')),
	array('label'=>'Crear Reporte', 'url'=>array('create')),
	array('label'=>'Actualizar Reporte', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Reporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Reporte', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'grupo_did',
		        'value'=>$model->grupo->nombre,),
		array(	'name'=>'alumno_aid',
		        'value'=>$model->alumno->nombre,),
		array(	'name'=>'semana_did',
		        'value'=>$model->semana->nombre,),
		'comentario',
	),
)); ?>
