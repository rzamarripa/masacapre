<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'reporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'grupo_did'); ?>">
		<?php echo $form->labelEx($model,'grupo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'grupo_did',CHtml::listData(Grupo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'grupo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'alumno_aid'); ?>">
		<?php echo $form->labelEx($model,'alumno_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'alumno_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('alumno/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'alumno', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'alumno_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'semana_did'); ?>">
		<?php echo $form->labelEx($model,'semana_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'semana_did',CHtml::listData(Semana::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'semana_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'comentario'); ?>">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'comentario',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'comentario'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
