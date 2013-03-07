<?php
$this->breadcrumbs=array(
	'Detail Inputs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetailInput','url'=>array('index')),
	array('label'=>'Create DetailInput','url'=>array('create')),
	array('label'=>'Update DetailInput','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete DetailInput','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetailInput','url'=>array('admin')),
);
?>

<h1>View DetailInput #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dipa_id',
		'dipa_version',
		'mak_uid',
		'uraian',
		'volume',
		'satuan_volume',
		'frequensi',
		'satuan_frequensi',
		'tarif',
		'jumlah',
		'uid',
		'version',
		'trash',
	),
)); ?>
