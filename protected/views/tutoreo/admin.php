<?php
$this->pageCaption='Manage Tutoreo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar tutoreo';
$this->breadcrumbs=array(
	'Tutoreo'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tutoreo', 'url'=>array('index')),
	array('label'=>'Crear Tutoreo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tutoreo-grid', {
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
	'id'=>'tutoreo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'alumno_aid',
		        'value'=>'$data->alumno->nombre',
			    'filter'=>CHtml::listData(Alumno::model()->findAll(), 'id', 'nombre'),),
		'faltas',
		array(	'name'=>'semana_did',
		        'value'=>'$data->semana->nombre',
			    'filter'=>CHtml::listData(Semana::model()->findAll(), 'id', 'nombre'),),
		'tareasNoEntregadas',
		array(	'name'=>'conducta_did',
		        'value'=>'$data->conducta->nombre',
			    'filter'=>CHtml::listData(Conducta::model()->findAll(), 'id', 'nombre'),),
		/*
		'observaciones',
		array(	'name'=>'maestroMateriaGrupo_aid',
		        'value'=>'$data->maestroMateriaGrupo->nombre',
			    'filter'=>CHtml::listData(MaestroMateriaGrupo::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
