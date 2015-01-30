<?php
$this->pageCaption='Materia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar materia';
$this->breadcrumbs=array(
	'Materia',
);

$this->menu=array(
	array('label'=>'Crear Materia', 'url'=>array('create')),
	array('label'=>'Administrar Materia', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
