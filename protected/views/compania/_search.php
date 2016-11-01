<?php
/* @var $this CompaniaController */
/* @var $model Compania */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCompa'); ?>
		<?php echo $form->textField($model,'idCompa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomCompa'); ?>
		<?php echo $form->textField($model,'nomCompa',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actividadCompa'); ?>
		<?php echo $form->textField($model,'actividadCompa',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->