<?php
$this->breadcrumbs=array(
	'Master Maks',
);

$this->menu=array(
	array('label'=>'Create MasterMak','url'=>array('create')),
	array('label'=>'Manage MasterMak','url'=>array('admin')),
);
?>

<h1>Master Maks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
