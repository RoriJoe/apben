<?php
$this->breadcrumbs=array(
	'Master Maks'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterMak','url'=>array('index')),
	array('label'=>'Manage MasterMak','url'=>array('admin')),
);
?>

<h1>Create MasterMak</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>