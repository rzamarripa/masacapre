<?php
$this->pageCaption='Reporte';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar reporte';
$this->breadcrumbs=array(
	'Reporte',
);

$this->menu=array(
	array('label'=>'Crear Reporte', 'url'=>array('create')),
	array('label'=>'Administrar Reporte', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
