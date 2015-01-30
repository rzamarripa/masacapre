<?php
$this->pageCaption='Actualizar Semana '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Semana'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Semana', 'url'=>array('index')),
	array('label'=>'Crear Semana', 'url'=>array('create')),
	array('label'=>'Ver Semana', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Semana', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>