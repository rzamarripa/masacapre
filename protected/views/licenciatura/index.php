<?php
$this->pageCaption='Licenciatura';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar licenciatura';
$this->breadcrumbs=array(
	'Licenciatura',
);

$this->menu=array(
	array('label'=>'Crear Licenciatura', 'url'=>array('create')),
	array('label'=>'Administrar Licenciatura', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
