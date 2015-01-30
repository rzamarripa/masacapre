	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->alumno->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->faltas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->semana->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tareasNoEntregadas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->conducta->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->observaciones); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->maestroMateriaGrupo->nombre); ?>
		</td>
		*/ ?>
	</tr>