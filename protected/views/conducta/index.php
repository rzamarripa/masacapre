<?php
$this->pageCaption='Conducta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar conducta';
$this->breadcrumbs=array(
	'Conducta',
);

$this->menu=array(
	array('label'=>'Crear Conducta', 'url'=>array('create')),
	array('label'=>'Administrar Conducta', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
