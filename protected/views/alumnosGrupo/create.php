<?php
$this->pageCaption='Create AlumnosGrupo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo alumnosgrupo';
$this->breadcrumbs=array(
	'Alumnos Grupo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Alumnos Grupo', 'url'=>array('index')),
	array('label'=>'Administrar Alumnos Grupo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>