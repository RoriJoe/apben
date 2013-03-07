<?php
$this->breadcrumbs=array(
	'Maks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mak','url'=>array('index')),
	array('label'=>'Create Mak','url'=>array('create')),
	array('label'=>'View Mak','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Mak','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>