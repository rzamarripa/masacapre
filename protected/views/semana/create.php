<?php
$this->pageCaption='Create Semana';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo semana';
$this->breadcrumbs=array(
	'Semana'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Semana', 'url'=>array('index')),
	array('label'=>'Administrar Semana', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>