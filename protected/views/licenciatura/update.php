<?php
$this->pageCaption='Actualizar Licenciatura '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Licenciatura'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Licenciatura', 'url'=>array('index')),
	array('label'=>'Crear Licenciatura', 'url'=>array('create')),
	array('label'=>'Ver Licenciatura', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Licenciatura', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>