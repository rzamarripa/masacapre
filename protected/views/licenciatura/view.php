<?php
$this->pageCaption='Ver Licenciatura #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Licenciatura'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Licenciatura', 'url'=>array('index')),
	array('label'=>'Crear Licenciatura', 'url'=>array('create')),
	array('label'=>'Actualizar Licenciatura', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Licenciatura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Licenciatura', 'url'=>array('admin')),
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
	),
)); ?>
