	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->alumno->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->grupo->nombre); ?>
		</td>
	</tr>