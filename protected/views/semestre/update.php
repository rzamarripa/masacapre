<?php
$this->pageCaption='Actualizar Semestre '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Semestre'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Semestre', 'url'=>array('index')),
	array('label'=>'Crear Semestre', 'url'=>array('create')),
	array('label'=>'Ver Semestre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Semestre', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>