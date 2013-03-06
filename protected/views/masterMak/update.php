<?php
$this->breadcrumbs=array(
	'Master Maks'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create MasterMak','url'=>array('create')),
	array('label'=>'Manage MasterMak','url'=>array('admin')),
);
?>

<h1>Update MasterMak <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>