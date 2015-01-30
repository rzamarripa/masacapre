<?php
$this->pageCaption='Actualizar Maestro '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Maestro'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Maestro', 'url'=>array('index')),
	array('label'=>'Crear Maestro', 'url'=>array('create')),
	array('label'=>'Ver Maestro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Maestro', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>