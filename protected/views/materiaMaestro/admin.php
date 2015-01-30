<?php
$this->pageCaption='Manage Materia Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar materia maestro';
$this->breadcrumbs=array(
	'Materia Maestro'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Materia Maestro', 'url'=>array('index')),
	array('label'=>'Crear MateriaMaestro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('materia-maestro-grid', {
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
	'id'=>'materia-maestro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'materia_aid',
		        'value'=>'$data->materia->nombre',
			    'filter'=>CHtml::listData(Materia::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'maestro_aid',
		        'value'=>'$data->maestro->nombre',
			    'filter'=>CHtml::listData(Maestro::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->relacion',
			    'filter'=>CHtml::listData(Estatus::model()->findAll('relacion is not null'), 'id', 'relacion'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
