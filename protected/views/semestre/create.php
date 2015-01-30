<?php
$this->pageCaption='Create Semestre';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo semestre';
$this->breadcrumbs=array(
	'Semestre'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Semestre', 'url'=>array('index')),
	array('label'=>'Administrar Semestre', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>