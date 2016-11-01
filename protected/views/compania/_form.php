<?php
/* @var $this CompaniaController */
/* @var $model Compania */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compania-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nomCompa'); ?>
		<?php echo $form->textField($model,'nomCompa',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nomCompa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actividadCompa'); ?>
		<?php echo $form->textField($model,'actividadCompa',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'actividadCompa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->