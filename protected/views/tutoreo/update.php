<?php
$this->pageCaption='Actualizar Tutoreo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tutoreo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a mi grupo', 'url'=>array('maestro/vertutoreoporgrupo', 							
							'maesmatgru' => $_GET['maesmatgru'],
							'semana_did' => $_GET['semana_did'],
							'grupo' => $_GET["grupo"])),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>