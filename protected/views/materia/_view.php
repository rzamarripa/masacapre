	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->licenciatura->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cantidad_planeaciones); ?>
		</td>
	</tr>