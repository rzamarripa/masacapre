<?php
$this->pageCaption='Actualizar AlumnosGrupo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Alumnos Grupo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Alumnos Grupo', 'url'=>array('index')),
	array('label'=>'Crear AlumnosGrupo', 'url'=>array('create')),
	array('label'=>'Ver AlumnosGrupo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Alumnos Grupo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>