<?php
$this->pageCaption='Actualizar Reporte '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Reporte'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Reporte', 'url'=>array('index')),
	array('label'=>'Crear Reporte', 'url'=>array('create')),
	array('label'=>'Ver Reporte', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Reporte', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>