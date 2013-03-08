<?php
$this->breadcrumbs=array(
	'Suboutputs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suboutput','url'=>array('index')),
	array('label'=>'Manage Suboutput','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'satuan_target'=>$satuan_target)); ?>