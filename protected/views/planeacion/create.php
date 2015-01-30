<?php
$this->pageCaption='Planeación';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear';
$this->breadcrumbs=array(
	'Planeación',
	'Crear',
);
/*
if(!isset($_GET['planeacion_id']))
{
	$this->menu=array(
		array('label'=>'Mis Planeaciones', 'url'=>array('misplaneaciones','materia'=>$_GET["materia"], 'matid'=>$_GET["matid"], 'maestroid'=>$_GET["maestroid"])),
	);
}
*/
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>