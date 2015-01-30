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
		<?php echo $form->label($model,'alumno_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'faltas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'faltas'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'semana_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,semana_did,CHtml::listData(Semana::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tareasNoEntregadas'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'tareasNoEntregadas'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'conducta_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,conducta_did,CHtml::listData(Conducta::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'observaciones'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'maestroMateriaGrupo_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'maestroMateriaGrupo_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('maestroMateriaGrupo/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'maestroMateriaGrupo', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
