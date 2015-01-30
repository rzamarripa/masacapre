<?php
$this->pageCaption='Manage Maestro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar maestro';
$this->breadcrumbs=array(
	'Maestro'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Maestro', 'url'=>array('index')),
	array('label'=>'Crear Maestro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('maestro-grid', {
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
	'id'=>'maestro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		'direccion',
		'telefono',
		'email',
		array(	'name'=>'usuario_did',
		        'value'=>'$data->usuario->usuario',
			    'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'usuario'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
