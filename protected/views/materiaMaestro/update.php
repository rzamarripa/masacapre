<?php
$this->pageCaption='Actualizar MateriaMaestro '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Materia Maestro'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Materia Maestro', 'url'=>array('index')),
	array('label'=>'Crear MateriaMaestro', 'url'=>array('create')),
	array('label'=>'Ver MateriaMaestro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Materia Maestro', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>