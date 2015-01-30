<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'materia-maestro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'materia_aid'); ?>">
		<?php echo $form->labelEx($model,'materia_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'materia_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('materia/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'materia', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'materia_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'maestro_aid'); ?>">
		<?php echo $form->labelEx($model,'maestro_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'maestro_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('maestro/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'maestro', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			
				<?php echo $form->error($model,'maestro_aid'); ?>
		</div>
	</div>
	<?php
	$criteria = new CDbCriteria();
	$criteria->select = 't.id, concat(c.nombre, " | ", t.nombre) as nombre'; 
	$criteria->join = 'INNER JOIN Ciclo c ON c.id = t.ciclo_did'; 
	$Grupos = Grupo::model()->findAll($criteria);
    ?>
	<div class="<?php echo $form->fieldClass($model, 'grupo_did'); ?>">
		<?php echo $form->labelEx($model,'grupo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'grupo_did',CHtml::listData($Grupos, 'id', 'nombre')); ?>			
			<?php echo $form->error($model,'grupo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll('relacion IS NOT NULL'), 'id', 'relacion')); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
