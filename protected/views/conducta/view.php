<?php
$this->pageCaption='Ver Conducta #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Conducta'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Conducta', 'url'=>array('index')),
	array('label'=>'Crear Conducta', 'url'=>array('create')),
	array('label'=>'Actualizar Conducta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Conducta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Conducta', 'url'=>array('admin')),
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
		'porcentaje',
	),
)); ?>
