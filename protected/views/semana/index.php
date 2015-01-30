<?php
$this->pageCaption='Semana';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar semana';
$this->breadcrumbs=array(
	'Semana',
);

$this->menu=array(
	array('label'=>'Crear Semana', 'url'=>array('create')),
	array('label'=>'Administrar Semana', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
