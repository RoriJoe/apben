<?php
$this->breadcrumbs=array(
	'Tagihans'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tagihan','url'=>array('index')),
	array('label'=>'Create Tagihan','url'=>array('create')),
	array('label'=>'View Tagihan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tagihan','url'=>array('admin')),
);
?>

<h1>Update Tagihan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>