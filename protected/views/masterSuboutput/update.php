<?php
$this->breadcrumbs=array(
	'Master Suboutputs'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create MasterSuboutput','url'=>array('create')),
	array('label'=>'Manage MasterSuboutput','url'=>array('admin')),
);
?>

<h1>Update MasterSuboutput <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>