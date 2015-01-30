<?php
$this->pageCaption='Crear alumno';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='nuevo';
$this->breadcrumbs=array(
	'Alumno'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Administrar Alumno', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'up'=>$up)); ?>