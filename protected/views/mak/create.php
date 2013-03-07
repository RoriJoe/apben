<?php
$this->breadcrumbs=array(
	'Maks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mak','url'=>array('index')),
	array('label'=>'Manage Mak','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>