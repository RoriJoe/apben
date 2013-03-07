<?php
$this->breadcrumbs=array(
	'Outputs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Output','url'=>array('index')),
	array('label'=>'Create Output','url'=>array('create')),
	array('label'=>'View Output','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Output','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>