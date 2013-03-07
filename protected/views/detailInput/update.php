<?php
$this->breadcrumbs=array(
	'Detail Inputs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetailInput','url'=>array('index')),
	array('label'=>'Create DetailInput','url'=>array('create')),
	array('label'=>'View DetailInput','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage DetailInput','url'=>array('admin')),
);
?>
&nbsp;
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>