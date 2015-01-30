<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'semana-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'ciclo_did'); ?>">
		<?php echo $form->labelEx($model,'ciclo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'ciclo_did',CHtml::listData(Ciclo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'ciclo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'semestre_did'); ?>">
		<?php echo $form->labelEx($model,'semestre_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'semestre_did',CHtml::listData(Semestre::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'semestre_did'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'fechaInicial_f'); ?>">
		<?php echo $form->labelEx($model,'fechaInicial_f'); ?>
		<div class="input">
			
			<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechaInicial_f',
				'language'=>'es',
				'options'=> array(
					'dateFormat'=>'yy-mm-dd', 
					'altFormat'=>'dd-mm-yy', 
					'changeMonth'=>'true', 
					'changeYear'=>'true', 
					'showOn'=>'both',
					'buttonText'=>'<i class="icon-calendar"></i>'
				),
			));
			
			?>	
			<?php echo $form->error($model,'fechaInicial_f'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'fechaFinal_f'); ?>">
		<?php echo $form->labelEx($model,'fechaFinal_f'); ?>
		<div class="input">
			
			<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechaFinal_f',
				'language'=>'es',
				'options'=> array(
					'dateFormat'=>'yy-mm-dd', 
					'altFormat'=>'dd-mm-yy', 
					'changeMonth'=>'true', 
					'changeYear'=>'true', 
					'showOn'=>'both',
					'buttonText'=>'<i class="icon-calendar"></i>'
				),
			));
			
			?>	
			<?php echo $form->error($model,'fechaFinal_f'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',array('1' => 'Activo', '2' => 'Inactivo')); ?>			
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
