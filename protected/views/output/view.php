<?php
$this->breadcrumbs=array(
	'Outputs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Output','url'=>array('index')),
	array('label'=>'Create Output','url'=>array('create')),
	array('label'=>'Update Output','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Output','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Output','url'=>array('admin')),
);
?>

<h1>View Output #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dipa_uid',
		'dipa_version',
		'kode',
		'uid',
		'version',
		'trash',
	),
)); ?>
