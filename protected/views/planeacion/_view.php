	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->maestro->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->materia->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->semestre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->consecutivo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->planeacion_didactica); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->bloque); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->sesiones); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tiempo_estimado); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estrategia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tema); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->subtema); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->problema_significativo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->activacion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->preguntas_inductivas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->competencias_conceptuales); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->competencias_procedimentales); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->competencias_actitudinales); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cierre_de_clase); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->metodos_de_evaluacion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->bibliograficos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->electronicos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->necesidades); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tarea); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		*/ ?>
	</tr>