<?php
$this->pageCaption='Manage Alumnos Grupo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar alumnos grupo';
$this->breadcrumbs=array(
	'Alumnos Grupo'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Alumnos Grupo', 'url'=>array('index')),
	array('label'=>'Crear AlumnosGrupo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alumnos-grupo-grid', {
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
	'id'=>'alumnos-grupo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'alumno_aid',
		        'value'=>'$data->alumno->nombre',
			    'filter'=>CHtml::listData(Alumno::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'grupo_aid',
		        'value'=>'$data->grupo->nombre',
			    'filter'=>CHtml::listData(Grupo::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
