<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'planeacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

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
					 )); ?>			<?php echo $form->error($model,'maestro_aid'); ?>
		</div>
	</div>

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

	<div class="<?php echo $form->fieldClass($model, 'semestre'); ?>">
		<?php echo $form->labelEx($model,'semestre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'semestre'); ?>
			<?php echo $form->error($model,'semestre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'consecutivo'); ?>">
		<?php echo $form->labelEx($model,'consecutivo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'consecutivo',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'consecutivo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'planeacion_didactica'); ?>">
		<?php echo $form->labelEx($model,'planeacion_didactica'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'planeacion_didactica',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'planeacion_didactica'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'bloque'); ?>">
		<?php echo $form->labelEx($model,'bloque'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'bloque',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'bloque'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'sesiones'); ?>">
		<?php echo $form->labelEx($model,'sesiones'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'sesiones',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'sesiones'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tiempo_estimado'); ?>">
		<?php echo $form->labelEx($model,'tiempo_estimado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tiempo_estimado',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'tiempo_estimado'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estrategia'); ?>">
		<?php echo $form->labelEx($model,'estrategia'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'estrategia',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'estrategia'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tema'); ?>">
		<?php echo $form->labelEx($model,'tema'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'tema',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'tema'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'subtema'); ?>">
		<?php echo $form->labelEx($model,'subtema'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'subtema',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'subtema'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'problema_significativo'); ?>">
		<?php echo $form->labelEx($model,'problema_significativo'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'problema_significativo',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'problema_significativo'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'activacion'); ?>">
		<?php echo $form->labelEx($model,'activacion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'activacion',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'activacion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'preguntas_inductivas'); ?>">
		<?php echo $form->labelEx($model,'preguntas_inductivas'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'preguntas_inductivas',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'preguntas_inductivas'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'competencias_conceptuales'); ?>">
		<?php echo $form->labelEx($model,'competencias_conceptuales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_conceptuales',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'competencias_conceptuales'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'competencias_procedimentales'); ?>">
		<?php echo $form->labelEx($model,'competencias_procedimentales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_procedimentales',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'competencias_procedimentales'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'competencias_actitudinales'); ?>">
		<?php echo $form->labelEx($model,'competencias_actitudinales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_actitudinales',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'competencias_actitudinales'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'actividades'); ?>">
		<?php echo $form->labelEx($model,'actividades'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'actividades',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'actividades'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cierre_de_clase'); ?>">
		<?php echo $form->labelEx($model,'cierre_de_clase'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'cierre_de_clase',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'cierre_de_clase'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'metodos_de_evaluacion'); ?>">
		<?php echo $form->labelEx($model,'metodos_de_evaluacion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'metodos_de_evaluacion',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'metodos_de_evaluacion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'bibliograficos'); ?>">
		<?php echo $form->labelEx($model,'bibliograficos'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'bibliograficos',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bibliograficos'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'electronicos'); ?>">
		<?php echo $form->labelEx($model,'electronicos'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'electronicos',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'electronicos'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'necesidades'); ?>">
		<?php echo $form->labelEx($model,'necesidades'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'necesidades',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'necesidades'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tarea'); ?>">
		<?php echo $form->labelEx($model,'tarea'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'tarea',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'tarea'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll('tipoUsuario_did = :x', array(':x' => $_GET['tipoUsuario'])), 'id', 'nombre')); ?>		
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
