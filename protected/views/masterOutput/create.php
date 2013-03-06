<?php
$this->breadcrumbs=array(
	'Master Outputs'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage MasterOutput','url'=>array('admin')),
);
?>

<h1>Create MasterOutput</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>