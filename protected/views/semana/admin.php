<?php
$this->pageCaption='Manage Semana';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar semana';
$this->breadcrumbs=array(
	'Semana'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Semana', 'url'=>array('index')),
	array('label'=>'Crear Semana', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('semana-grid', {
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
	'id'=>'semana-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		array(	'name'=>'ciclo_did',
		        'value'=>'$data->ciclo->nombre',
			    'filter'=>CHtml::listData(Ciclo::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'semestre_did',
		        'value'=>'$data->semestre->nombre',
			    'filter'=>CHtml::listData(Semestre::model()->findAll(), 'id', 'nombre'),),
		'fechaInicial_f',
		'fechaFinal_f',
		/*
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
