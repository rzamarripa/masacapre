<?php
$this->pageCaption='Create Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo maestro';
$this->breadcrumbs=array(
	'Maestro'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Maestro', 'url'=>array('index')),
	array('label'=>'Administrar Maestro', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>