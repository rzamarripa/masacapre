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
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'matricula'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'matricula',array('size'=>10,'maxlength'=>10)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'foto'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
