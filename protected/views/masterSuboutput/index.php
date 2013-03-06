<?php
$this->breadcrumbs=array(
	'Master Suboutputs',
);

$this->menu=array(
	array('label'=>'Create MasterSuboutput','url'=>array('create')),
	array('label'=>'Manage MasterSuboutput','url'=>array('admin')),
);
?>

<h1>Master Suboutputs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
