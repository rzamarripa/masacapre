<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'planeacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Seleccione el grupo <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>		
		<?php echo $form->dropDownList($model,'nombre',CHtml::listData(Grupo::model()->findAll()), 'id', 'nombre')); ?>		
		<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
