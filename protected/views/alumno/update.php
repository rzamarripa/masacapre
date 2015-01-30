<?php
$this->pageCaption='Actualizar Alumno '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Alumno'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Alumno', 'url'=>array('index')),
	array('label'=>'Crear Alumno', 'url'=>array('create')),
	array('label'=>'Ver Alumno', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Alumno', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'up'=>$up)); ?>