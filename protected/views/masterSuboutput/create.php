<?php
$this->breadcrumbs=array(
	'Master Suboutputs'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage MasterSuboutput','url'=>array('admin')),
);
?>

<h1>Create MasterSuboutput</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>