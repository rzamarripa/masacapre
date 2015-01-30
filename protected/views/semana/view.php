<?php
$this->pageCaption='Ver Semana #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Semana'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Semana', 'url'=>array('index')),
	array('label'=>'Crear Semana', 'url'=>array('create')),
	array('label'=>'Actualizar Semana', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Semana', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Semana', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		array(	'name'=>'ciclo_did',
		        'value'=>$model->ciclo->nombre,),
		array(	'name'=>'semestre_did',
		        'value'=>$model->semestre->nombre,),
		'fechaInicial_f',
		'fechaFinal_f',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
