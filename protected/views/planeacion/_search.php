<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'maestro_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'materia_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'semestre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'semestre'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'consecutivo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'consecutivo'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'planeacion_didactica'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'planeacion_didactica',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'bloque'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'bloque',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'sesiones'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'sesiones'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tiempo_estimado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tiempo_estimado',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estrategia'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'estrategia',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tema'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'tema',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'subtema'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'subtema',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'problema_significativo'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'problema_significativo',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'competencias_conceptuales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_conceptuales',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'competencias_procedimentales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_procedimentales',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'competencias_actitudinales'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'competencias_actitudinales',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'metodos_de_evaluacion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'metodos_de_evaluacion',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'bibliograficos'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'bibliograficos',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'electronicos'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'electronicos',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'necesidades'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'necesidades',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
