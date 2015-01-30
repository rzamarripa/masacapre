	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->relacion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tipoUsuario->nombre); ?>
		</td>
	</tr>