<?php
$this->breadcrumbs=array(
	'Outputs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Output','url'=>array('index')),
	array('label'=>'Manage Output','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>