<?php
$this->pageCaption='Tutoreo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tutoreo';
$this->breadcrumbs=array(
	'Tutoreo',
);

$this->menu=array(
	array('label'=>'Crear Tutoreo', 'url'=>array('create')),
	array('label'=>'Administrar Tutoreo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
