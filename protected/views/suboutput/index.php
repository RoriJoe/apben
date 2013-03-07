<?php
$this->breadcrumbs=array(
	'Suboutputs',
);

$this->menu=array(
	array('label'=>'Create Suboutput','url'=>array('create')),
	array('label'=>'Manage Suboutput','url'=>array('admin')),
);
?>

<h1>Suboutputs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
