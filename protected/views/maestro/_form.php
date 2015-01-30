<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'maestro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'direccion'); ?>">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'telefono'); ?>">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'telefono',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'usuario_did'); ?>">
		<?php echo $form->labelEx($model,'usuario_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'usuario_did',CHtml::listData(Usuario::model()->findAll(), 'id', 'usuario')); ?>			<?php echo $form->error($model,'usuario_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
