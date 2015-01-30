<?php
$this->pageCaption='Create Ciclo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo ciclo';
$this->breadcrumbs=array(
	'Ciclo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Ciclo', 'url'=>array('index')),
	array('label'=>'Administrar Ciclo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>