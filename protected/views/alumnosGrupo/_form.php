<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'alumnos-grupo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

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

	<div class="<?php echo $form->fieldClass($model, 'grupo_aid'); ?>">
		<?php echo $form->labelEx($model,'grupo_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'grupo_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('grupo/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'grupo', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'grupo_aid'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
