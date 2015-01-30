<?php
$this->pageCaption='Actualizar Archivo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Archivo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a mis planeaciones', 'url'=>array('planeacion/misplaneaciones', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => Yii::app()->user->name)),
	array('label'=>'Ver Archivo', 'url'=>array('view', 'id'=>$model->id)),
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'up'=>$up)); ?>