	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->ciclo->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->semestre->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaInicial_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaFinal_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>