<?php
$this->pageCaption='Ver Materia #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Materia'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Materia', 'url'=>array('index')),
	array('label'=>'Crear Materia', 'url'=>array('create')),
	array('label'=>'Actualizar Materia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Materia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Materia', 'url'=>array('admin')),
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
		array(	'name'=>'licenciatura_aid',
		        'value'=>$model->licenciatura->nombre,),
		'cantidad_planeaciones',
	),
)); ?>
