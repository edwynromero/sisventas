<?php $this->beginContent('//layouts/
main'); ?>
 <div class="row">
 <div class="span3">
<?php $this->widget
('bootstrap.widgets.TbBreadcrumb' ,
array (
'links ' => array (
'Library ' => ' # ',
'Data' ,
 ),
)); ?>
 </div>
 <div class="span9">
 <?php echo $content; ?>
 </div>
 </div>
<?php $this->endContent(); ?>