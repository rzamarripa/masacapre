<?php
$this->pageCaption='Ver Planeación de '.$model->materia->nombre . ' consecutivo ' . $model->consecutivo;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Planeación',
	$model->consecutivo,
);
?>

<?php 
$tipoUsuario = TipoUsuario::model()->tipoUsuarioZama();
if($tipoUsuario[0]["nombre"] == 'Maestro')
{
	if ($model->estatus_did == 1 || $model->estatus_did == 2){
		$this->menu=array(
			array('label'=>'Volver a mis planeaciones', 'url'=>array('misplaneaciones', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => Yii::app()->user->name)),
			array('label'=>'Crear Planeación', 'url'=>array('create', 
							'maestroid' => $model->maestro_aid, 
							'matid' => $model->materia_aid,
							'tipoUsuario' => 2)),
			array('label'=>'Actualizar Planeación', 'url'=>array('update', 'id'=>$model->id, 'tipoUsuario'=> $tipoUsuario[0]["id"])),
		);
	}
	elseif($model->estatus_did == 3 || $model->estatus_did == 4){
		$this->menu=array(
			array('label'=>'Volver a mis planeaciones', 'url'=>array('misplaneaciones', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => $model->maestro->usuario->usuario)),
			array('label'=>'Crear Planeación', 'url'=>array('create', 
							'maestroid' => $model->maestro_aid, 
							'matid' => $model->materia_aid,
							'tipoUsuario' => 2)),
		);
	}
}
elseif($tipoUsuario[0]["nombre"] == 'Coordinador')
{
	if ($model->estatus_did == 1 || $model->estatus_did == 2){
		$this->menu=array(
			array('label'=>'Volver a mis planeaciones', 'url'=>array('planporcoord', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => $model->maestro->usuario->usuario)),
			array('label'=>'Actualizar Planeación', 'url'=>array('update', 'id'=>$model->id, 'tipoUsuario'=> $tipoUsuario[0]["id"])),
		);
	}
	elseif($model->estatus_did == 3 || $model->estatus_did == 4){
		$this->menu=array(
			array('label'=>'Volver a mis planeaciones', 'url'=>array('planporcoord', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => $model->maestro->usuario->usuario)),			
		);
	}
}
else
{
	$this->menu=array(
			array('label'=>'Volver a mis planeaciones', 'url'=>array('planporadmin', 
							'materia' => $model->materia->nombre, 
							'matid' => $model->materia->id, 
							'maestroid' => $model->maestro->id,
							'usuario' => $model->maestro->usuario->usuario)),			
		);
}

 ?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'nullDisplay'=>'<No hay información>',
	'attributes'=>array(
		array(               // related city displayed as a link
            'label'=>'Id',
            'type'=>'raw',
            'value'=>'<pre>' . $model->id . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Maestro',
            'type'=>'raw',
            'value'=>'<pre>' . $model->maestro->nombre . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Materia',
            'type'=>'raw',
            'value'=>'<pre>' . $model->materia->nombre . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Semestre',
            'type'=>'raw',
            'value'=>'<pre>' . $model->semestre . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Consecutivo',
            'type'=>'raw',
            'value'=>'<pre>' . $model->consecutivo . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Planeación Didáctica',
            'type'=>'raw',
            'value'=>'<pre>' . $model->planeacion_didactica . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Bloque',
            'type'=>'raw',
            'value'=>'<pre>' . $model->bloque . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Sesiones',
            'type'=>'raw',
            'value'=>'<pre>' . $model->sesiones . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Tiempo Estimado',
            'type'=>'raw',
            'value'=>'<pre>' . $model->tiempo_estimado . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Estrategia',
            'type'=>'raw',
            'value'=>'<pre>' . $model->estrategia . '</pre>',
        ),
		array(               // related city displayed as a link
            'label'=>'<pre>Tema</pre>',
            'type'=>'raw',
            'value'=>'<pre>' . $model->tema . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Subtema',
            'type'=>'raw',
            'value'=>'<pre>' . $model->subtema . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Problema Significativo',
            'type'=>'raw',
            'value'=>'<pre>' . $model->problema_significativo . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Activación',
            'type'=>'raw',
            'value'=>'<pre>' . $model->activacion . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Preguntas Inductivas',
            'type'=>'raw',
            'value'=>'<pre>' . $model->preguntas_inductivas . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Competencias Conceptuales',
            'type'=>'raw',
            'value'=>'<pre>' . $model->competencias_conceptuales . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Competencias Procedimentales',
            'type'=>'raw',
            'value'=>'<pre>' . $model->competencias_procedimentales . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Competencias Actitudinales',
            'type'=>'raw',
            'value'=>'<pre>' . $model->competencias_actitudinales . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Actividades',
            'type'=>'raw',
            'value'=>'<pre>' . $model->actividades . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Cierre de Clase',
            'type'=>'raw',
            'value'=>'<pre>' . $model->cierre_de_clase . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Métodos de Evaluación',
            'type'=>'raw',
            'value'=>'<pre>' . $model->metodos_de_evaluacion . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Bibliográficos',
            'type'=>'raw',
            'value'=>'<pre>' . $model->bibliograficos . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Electrónicos',
            'type'=>'raw',
            'value'=>'<pre>' . $model->electronicos . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Necesidades',
            'type'=>'raw',
            'value'=>'<pre>' . $model->necesidades . '</pre>',
        ),
        array(               // related city displayed as a link
            'label'=>'Tarea',
            'type'=>'raw',
            'value'=>'<pre>' . $model->tarea . '</pre>',
        ),			
		array(               // related city displayed as a link
            'label'=>'Estatus',
            'type'=>'raw',
            'value'=>'<pre>' . $model->estatus->nombre . '</pre>',
        ),
	),
)); ?>

<?php
	if($tipoUsuario[0]["nombre"] == 'Administrador')
	{
		echo '<div>' . CHtml::link('<i class="icon-upload"></i> Subido a Plataforma', "#", array('submit'=> array('planeacion/cambiarestatus', 'id'=>$model->id, 'estatus'=>4, 'tipoUsuario' => 4), 'confirm' => 'Estás seguro que quiere pasar esta planeación a En Plataforma?')) . '</div>';
	}
?>