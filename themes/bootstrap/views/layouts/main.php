<!DOCTYPE html>

<head>

<title><?php echo CHtml::encode
($this->pageTitle); ?></title>
 <meta charset="<?php echo Yii::app
()->charset;?>">
<?php echo Yii::app()->bootstrap->registerAllCss(); ?>
<?php echo Yii::app()->bootstrap->registerCoreScripts(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />

</head>
<body>
<?php Yii::app()->bootstrap->register(); ?>
<header>
<?php $this->widget('\TbNav', array(
    'type' => TbHtml::NAV_TYPE_TABS,
    'items' => array(
        array('label' => 'Home', 'url' => '#', 'active' => true),
        array('label' => 'Profile', 'url' => '#',),
        array('label' => 'Messages', 'url' => '#',),
    ),
)); ?>
</header>
<div class="container" id="main">
 <?php if(isset($this->breadcrumbs)):?>
 <?php $this->widget
('bootstrap.widgets.TbBreadcrumbs',
array(
 'links'=>$this->breadcrumbs,
 )); ?>
 <?php endif?>
 <?php echo $content; ?>
 <hr>
 <footer>
 Copyright &copy; <?php echo date
('Y'); ?> <?php echo CHtml::encode
(Yii::app()->params['empresa']); ?>
| <?php echo CHtml::encode((Yii::app
()->name).' '.Yii::app()->params
['version']); ?> - All Rights
Reserved.<br/>
 <?php echo Yii::powered(); ?>
 </footer>
</div>
</body>
</html>
