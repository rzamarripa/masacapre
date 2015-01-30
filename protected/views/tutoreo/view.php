<?php
$this->pageCaption='Ver Tutoreo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tutoreo',
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver a mi grupo', 'url'=>array('maestro/vertutoreoporgrupo', 
							'maesmatgru' => $_GET['maesmatgru'],
							'semana_did' => $_GET['semana_did'])),
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
		array(	'name'=>'semana_did',
		        'value'=>$model->semana->nombre,),
		'faltas',
		'tareasNoEntregadas',
		array(	'name'=>'conducta_did',
		        'value'=>$model->conducta->nombre,),
		'observaciones',
	),
)); ?>
