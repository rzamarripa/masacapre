<?php
$this->pageCaption='Semestre';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar semestre';
$this->breadcrumbs=array(
	'Semestre',
);

$this->menu=array(
	array('label'=>'Crear Semestre', 'url'=>array('create')),
	array('label'=>'Administrar Semestre', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
