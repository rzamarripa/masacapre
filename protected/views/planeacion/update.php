<?php
$this->pageCaption='Actualizar Planeación '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Planeación',
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
$tipoUsuario = TipoUsuario::model()->tipoUsuarioZama();
if($tipoUsuario[0]["nombre"] == 'Maestro')
{
	$this->menu=array(
		array('label'=>'Volver a mis planeaciones', 'url'=>array('misplaneaciones', 
									'materia' => $model->materia->nombre, 
									'matid' => $model->materia->id, 
									'maestroid' => $model->maestro->id,
									'usuario' => $model->maestro->usuario->usuario)),
		array('label'=>'Crear Planeación', 'url'=>array('create')),
		array('label'=>'Ver Planeación', 'url'=>array('view', 'id'=>$model->id)),
	);
}
else
{
	$this->menu=array(
		array('label'=>'Volver a mis planeaciones', 'url'=>array('planporcoord', 
									'materia' => $model->materia->nombre, 
									'matid' => $model->materia->id, 
									'maestroid' => $model->maestro->id,
									'usuario' => $model->maestro->usuario->usuario)),		
		array('label'=>'Ver Planeación', 'url'=>array('view', 'id'=>$model->id)),
	);
}
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>