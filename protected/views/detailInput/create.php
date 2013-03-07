<?php
$this->breadcrumbs=array(
	'Detail Inputs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetailInput','url'=>array('index')),
	array('label'=>'Manage DetailInput','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>