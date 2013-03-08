<?php
$this->breadcrumbs=array(
	'Suboutputs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Suboutput','url'=>array('index')),
	array('label'=>'Create Suboutput','url'=>array('create')),
	array('label'=>'Update Suboutput','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Suboutput','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suboutput','url'=>array('admin')),
);
?>

<h1>View Suboutput #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dipa_uid',
		'dipa_version',
		'output_uid',
		'kode',
		'uid',
		'version',
		'trash',
	),
)); ?>
