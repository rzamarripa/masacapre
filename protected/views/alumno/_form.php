<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'alumno-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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

	<div class="<?php echo $form->fieldClass($model, 'matricula'); ?>">
		<?php echo $form->labelEx($model,'matricula'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'matricula',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'matricula'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($up, 'foto'); ?>">
		<?php echo $form->labelEx($up,'foto'); ?>
		<div class="input">
			<?php echo $form->FileField($up,'fo'); ?>
			<?php echo $form->error($up,'fo'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll('relacion IS NOT NULL'), 'id', 'relacion')); ?>			
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
