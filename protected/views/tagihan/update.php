<?php
$this->breadcrumbs=array(
	'Tagihan'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tagihan','url'=>array('index')),
	array('label'=>'Create Tagihan','url'=>array('create')),
	array('label'=>'View Tagihan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tagihan','url'=>array('admin')),
);
?>

<h1><?php if (isset($_GET['mode'])): ?>Lihat<?php else: ?>Update<?php endif; ?> Tagihan</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>