<?php
$this->breadcrumbs=array(
	'Suboutputs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suboutput','url'=>array('index')),
	array('label'=>'Create Suboutput','url'=>array('create')),
	array('label'=>'View Suboutput','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Suboutput','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>