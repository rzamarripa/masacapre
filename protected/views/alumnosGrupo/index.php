<?php
$this->pageCaption='Alumnos Grupo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar alumnos grupo';
$this->breadcrumbs=array(
	'Alumnos Grupo',
);

$this->menu=array(
	array('label'=>'Crear AlumnosGrupo', 'url'=>array('create')),
	array('label'=>'Administrar AlumnosGrupo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
