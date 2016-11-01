<?php
/* @var $this CompaniaController */
/* @var $data Compania */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCompa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCompa), array('generarpdf2', 'id'=>$data->idCompa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomCompa')); ?>:</b>
	<?php echo CHtml::encode($data->nomCompa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actividadCompa')); ?>:</b>
	<?php echo CHtml::encode($data->actividadCompa); ?>
	<br />


</div>