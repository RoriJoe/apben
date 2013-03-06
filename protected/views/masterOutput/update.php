<?php
$this->breadcrumbs=array(
	'Master Outputs'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create MasterOutput','url'=>array('create')),
	array('label'=>'Manage MasterOutput','url'=>array('admin')),
);
?>

<h1>Update MasterOutput <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>