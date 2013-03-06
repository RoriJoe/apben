<?php
$this->breadcrumbs=array(
	'Master Outputs',
);

$this->menu=array(
	array('label'=>'Create MasterOutput','url'=>array('create')),
	array('label'=>'Manage MasterOutput','url'=>array('admin')),
);
?>

<h1>Master Outputs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
