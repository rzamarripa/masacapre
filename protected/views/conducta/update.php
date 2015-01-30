<?php
$this->pageCaption='Actualizar Conducta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Conducta'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Conducta', 'url'=>array('index')),
	array('label'=>'Crear Conducta', 'url'=>array('create')),
	array('label'=>'Ver Conducta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Conducta', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>