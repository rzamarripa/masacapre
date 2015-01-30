<?php
$this->pageCaption='Ver MateriaMaestro #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Materia Maestro'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Materia Maestro', 'url'=>array('index')),
	array('label'=>'Crear MateriaMaestro', 'url'=>array('create')),
	array('label'=>'Actualizar MateriaMaestro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar MateriaMaestro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Materia Maestro', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'materia_aid',
		        'value'=>$model->materia->nombre,),
		array(	'name'=>'maestro_aid',
		        'value'=>$model->maestro->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		'fechaCreacion_f',
	),
)); ?>
