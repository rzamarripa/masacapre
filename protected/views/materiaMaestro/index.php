<?php
$this->pageCaption='Materia Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar materia maestro';
$this->breadcrumbs=array(
	'Materia Maestro',
);

$this->menu=array(
	array('label'=>'Crear MateriaMaestro', 'url'=>array('create')),
	array('label'=>'Administrar MateriaMaestro', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
