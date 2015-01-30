<?php
$this->pageCaption='Crear Archivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo archivo';
$this->breadcrumbs=array(
	'Archivo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a mis materias', 'url'=>array('maestro/vermateriaspormaestro')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'up'=>$up)); ?>