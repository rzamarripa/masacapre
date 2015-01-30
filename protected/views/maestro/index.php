<?php
$this->pageCaption='Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar maestro';
$this->breadcrumbs=array(
	'Maestro',
);

$this->menu=array(
	array('label'=>'Crear Maestro', 'url'=>array('create')),
	array('label'=>'Administrar Maestro', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
