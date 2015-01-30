<?php
$this->pageCaption='Create Reporte';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo reporte';
$this->breadcrumbs=array(
	'Reporte'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Reporte', 'url'=>array('index')),
	array('label'=>'Administrar Reporte', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>