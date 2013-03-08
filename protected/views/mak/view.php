<?php
$this->breadcrumbs=array(
	'Maks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mak','url'=>array('index')),
	array('label'=>'Create Mak','url'=>array('create')),
	array('label'=>'Update Mak','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Mak','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mak','url'=>array('admin')),
);
?>

<h1>View Mak #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dipa_uid',
		'dipa_version',
		'suboutput_uid',
		'kode',
		'sumber_dana',
		'pagu',
		'uid',
		'version',
		'trash',
	),
)); ?>
