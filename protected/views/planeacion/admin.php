<?php
$this->pageCaption='Manage Planeacion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar planeacion';
$this->breadcrumbs=array(
	'Planeacion'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Planeacion', 'url'=>array('index')),
	array('label'=>'Crear Planeacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('planeacion-grid', {
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
	'id'=>'planeacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'maestro_aid',
		        'value'=>'$data->maestro->nombre',
			    'filter'=>CHtml::listData(Maestro::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'materia_aid',
		        'value'=>'$data->materia->nombre',
			    'filter'=>CHtml::listData(Materia::model()->findAll(), 'id', 'nombre'),),
		'semestre',
		'consecutivo',
		'planeacion_didactica',
		/*
		'bloque',
		'sesiones',
		'tiempo_estimado',
		'estrategia',
		'tema',
		'subtema',
		'problema_significativo',
		'competencias_conceptuales',
		'competencias_procedimentales',
		'competencias_actitudinales',
		'metodos_de_evaluacion',
		'bibliograficos',
		'electronicos',
		'necesidades',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
