<?php
$this->pageCaption='Manage Reporte';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar reporte';
$this->breadcrumbs=array(
	'Reporte'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Reporte', 'url'=>array('index')),
	array('label'=>'Crear Reporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reporte-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reporte-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'grupo_did',
		        'value'=>'$data->grupo->nombre',
			    'filter'=>CHtml::listData(Grupo::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'alumno_aid',
		        'value'=>'$data->alumno->nombre',
			    'filter'=>CHtml::listData(Alumno::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'semana_did',
		        'value'=>'$data->semana->nombre',
			    'filter'=>CHtml::listData(Semana::model()->findAll(), 'id', 'nombre'),),
		'comentario',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
