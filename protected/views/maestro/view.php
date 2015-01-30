<?php
$this->pageCaption='Ver Maestro #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Maestro'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Maestro', 'url'=>array('index')),
	array('label'=>'Crear Maestro', 'url'=>array('create')),
	array('label'=>'Actualizar Maestro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Maestro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Maestro', 'url'=>array('admin')),
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
		'direccion',
		'telefono',
		'email',
		array(	'name'=>'usuario_did',
		        'value'=>$model->usuario->usuario,),
	),
)); ?>
