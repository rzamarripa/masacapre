<?php
$semana = Semana::model()->find('id = ' . $_GET['semana_did']);

$this->pageCaption='Crear Tutoreo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='nuevo';
$this->breadcrumbs=array(
	'Mis materias'	=>Yii::app()->user->returnUrl,
	'Mis Grupos'	=>array('maestro/vergrupospormaestro', 'maesmatgru' => $_GET['maesmatgru']),
	$semana->nombre	=>array('maestro/vertutoreoporgrupo', 'maesmatgru'	=> $_GET['maesmatgru'], 'semana_did' => $_GET['semana_did']),
	'Crear Tutoreo',
);

$this->menu=array(
	array('label'=>'Volver a mi grupo', 'url'=>array('maestro/vertutoreoporgrupo', 							
							'maesmatgru' => $_GET['maesmatgru'],
							'semana_did' => $_GET['semana_did'])),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>