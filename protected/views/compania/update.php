<?php
/* @var $this CompaniaController */
/* @var $model Compania */

$this->breadcrumbs=array(
	'Companias'=>array('index'),
	$model->idCompa=>array('view','id'=>$model->idCompa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Compania', 'url'=>array('index')),
	array('label'=>'Create Compania', 'url'=>array('create')),
	array('label'=>'View Compania', 'url'=>array('view', 'id'=>$model->idCompa)),
	array('label'=>'Manage Compania', 'url'=>array('admin')),
);
?>

<h1>Update Compania <?php echo $model->idCompa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>