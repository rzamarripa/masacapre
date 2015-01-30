<?php
$this->pageCaption='Create Licenciatura';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo licenciatura';
$this->breadcrumbs=array(
	'Licenciatura'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Licenciatura', 'url'=>array('index')),
	array('label'=>'Administrar Licenciatura', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>