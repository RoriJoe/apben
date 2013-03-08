<?php
$this->breadcrumbs=array(
	'Tagihans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tagihan','url'=>array('index')),
	array('label'=>'Manage Tagihan','url'=>array('admin')),
);
?>

<h1>Create Tagihan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>