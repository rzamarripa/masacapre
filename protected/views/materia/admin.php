<?php
$this->pageCaption='Manage Materia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar materia';
$this->breadcrumbs=array(
	'Materia'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Materia', 'url'=>array('index')),
	array('label'=>'Crear Materia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('materia-grid', {
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
	'id'=>'materia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		array(	'name'=>'licenciatura_aid',
		        'value'=>'$data->licenciatura->nombre',
			    'filter'=>CHtml::listData(Licenciatura::model()->findAll(), 'id', 'nombre'),),
		'cantidad_planeaciones',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
