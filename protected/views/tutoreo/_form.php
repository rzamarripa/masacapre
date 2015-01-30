<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tutoreo-form',
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
	
	<div class="<?php echo $form->fieldClass($model, 'semana_did'); ?>">
		<?php echo $form->labelEx($model,'semana_did'); ?>
		<div class="input">
			
			<?php 
			if($model->isNewRecord){
			echo $form->dropDownList($model,'semana_did',CHtml::listData(Semana::model()->findAll(
				array('condition'=>'estatus_did = 1 && 
										id not in (select distinct(semana_did) 
										from Tutoreo where alumno_aid = ' . $_GET['alumno_aid'] . ' && maestroMateriaGrupo_aid = ' . $_GET['maesmatgru'] . ')',
								   'order'=>'fechaInicial_f desc')), 'id', 'nombre')); }
			else
				echo $form->dropDownList($model,'semana_did',CHtml::listData(Semana::model()->findAll('estatus_did = 1'),'id','nombre'));?>			
			<?php echo $form->error($model,'semana_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'conducta_did'); ?>">
		<?php echo $form->labelEx($model,'conducta_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'conducta_did',CHtml::listData(Conducta::model()->findAll(array('order'=>'porcentaje DESC')), 'id', 'nombre')); ?>			
			<?php echo $form->error($model,'conducta_did'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'faltas'); ?>">
		<?php echo $form->labelEx($model,'faltas'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'faltas', 
				array(	
						'0' => '0',
						'1' => '1', 
						'2' => '2', 
						'3' => '3', 
						'4' => '4', 
						'5' => '5', 
					)); ?>
			<?php echo $form->error($model,'faltas'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tareasNoEntregadas'); ?>">
		<?php echo $form->labelEx($model,'tareasNoEntregadas'); ?>
		<div class="input">			
			<?php echo $form->dropDownList($model,'tareasNoEntregadas', 
				array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', )); ?>
			<?php echo $form->error($model,'tareasNoEntregadas'); ?>
		</div>
	</div>	
	
	<div class="<?php echo $form->fieldClass($model, 'observaciones'); ?>">
		
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'observaciones',array('size'=>150,'maxlength'=>150, 'rows'=>6, 'cols'=>100)); ?>
			<span class="muted">Las observaciones aceptan hasta 150 caracteres (letras).</span>
			<?php echo $form->error($model,'observaciones'); ?>
		</div>
		
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
