<?php
$this->pageCaption='Create Conducta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo conducta';
$this->breadcrumbs=array(
	'Conducta'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Conducta', 'url'=>array('index')),
	array('label'=>'Administrar Conducta', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>