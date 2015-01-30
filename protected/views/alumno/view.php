<?php
$usuarioActual = Usuario::model()->find('usuario = "' . Yii::app()->user->name . '"');
$this->pageCaption='Ver Alumno: '.$model->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';


if($usuarioActual->tipoUsuario->nombre == 'Maestro' ){
	$maestromateriagrupo = MateriaMaestro::model()->find('id = ' . $_GET['maesmatgru']);
	$this->pageCaption='Ver Alumno: '.$model->nombre;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';


	$this->breadcrumbs=array(
		$maestromateriagrupo->materia->nombre => 
			array('maestro/vergrupospormaestro', 'maesmatgru' => $_GET['maesmatgru']),
		$maestromateriagrupo->grupo->nombre =>
			array('maestro/veralumnosporgrupo', 'maesmatgru' => $_GET['maesmatgru']),
		'Alumno',
	);
	
	$this->menu=array(
		array('label'=>'Volver', 'url'=>array('maestro/veralumnosporgrupo', 'maesmatgru' => $_GET['maesmatgru']),),
		/*array('label'=>'Listar Alumno', 'url'=>array('index')),
		array('label'=>'Crear Alumno', 'url'=>array('create')),
		array('label'=>'Actualizar Alumno', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Eliminar Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
		array('label'=>'Administrar Alumno', 'url'=>array('admin')),*/
	);
}
else
{
	$this->menu=array(		
		array('label'=>'Listar Alumno', 'url'=>array('index')),
		array('label'=>'Crear Alumno', 'url'=>array('create')),
		array('label'=>'Actualizar Alumno', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Eliminar Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que quieres eliminar este elemento?')),
		array('label'=>'Administrar Alumno', 'url'=>array('admin')),
	);
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		array(
            'label'=>'foto',
            'type'=>'raw',
            'value'=> ($model->foto != "") ? 
            			'<img src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $model->foto . '" alt="' . $model->nombre . '" width=100 height=100/>'
            			:
            			'<img src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . 'sin_imagen.jpg' . '" alt="' . $model->nombre . '" width=100 height=100/>',
            'htmloptions'=>'class="span2"',
        ),
		'nombre',
		'matricula',		
	),
)); 

$tutoreo = Tutoreo::model()->findAll('alumno_aid = ' . $model->id);
if(isset($tutoreo) && count($tutoreo)>0){
	echo '
		<table class="table table-bordered">
			<thead class="thead">
				<tr>
					<td>Semana</td>
					<td>Materia</td>
					<td>Maestro</td>
					<td>Conducta</td>
					<td>Porcentaje</td>
				</tr>
			</thead>
			<tbody>';
	foreach($tutoreo as $tut)
	{
		
		echo '
				<tr>
					<td>' . $tut->semana->nombre . '</td>
					<td>' . $tut->maestroMateriaGrupo->materia->nombre . '</td>
					<td>' . $tut->maestroMateriaGrupo->maestro->nombre . '</td>
					<td>' . $tut->conducta->nombre . '</td>
					<td>' . $tut->conducta->porcentaje . '</td>
				</tr>	';	
	}
	echo "</tbody>
	</table>";
}
else
{
	echo '<hr>';
	echo '<h3>No tiene Tutoreo</h3>';
}





?>
