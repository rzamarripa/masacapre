<?php
$this->pageCaption='Archivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar archivo';
$this->breadcrumbs=array(
	'Archivo',
);

$this->menu=array(
	array('label'=>'Crear Archivo', 'url'=>array('create')),
	array('label'=>'Administrar Archivo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
