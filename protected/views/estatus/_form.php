<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'estatus-form',
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

	<div class="<?php echo $form->fieldClass($model, 'relacion'); ?>">
		<?php echo $form->labelEx($model,'relacion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'relacion',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'relacion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tipoUsuario_did'); ?>">
		<?php echo $form->labelEx($model,'tipoUsuario_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'tipoUsuario_did',CHtml::listData(TipoUsuario::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'tipoUsuario_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
