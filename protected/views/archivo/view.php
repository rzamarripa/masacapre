<?php
$this->pageCaption='Ver Archivo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Archivo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver a mis planeaciones', 'url'=>array('planeacion/misplaneaciones', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => Yii::app()->user->name)),
	array('label'=>'Subir otro archivo', 'url'=>array('archivo/create', 
							'maestroid' => $model->maestro->id, 
							'matid' => $model->materia->id,
							'tipoUsuario' => 2)),
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
		'descripcion',
		array(	'name'=>'maestro_did',
		        'value'=>$model->maestro->nombre,),
		array(	'name'=>'materia_did',
		        'value'=>$model->materia->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
	),
)); ?>
