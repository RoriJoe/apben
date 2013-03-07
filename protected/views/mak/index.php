<?php
$this->breadcrumbs=array(
	'Maks',
);

$this->menu=array(
	array('label'=>'Create Mak','url'=>array('create')),
	array('label'=>'Manage Mak','url'=>array('admin')),
);
?>

<h1>Maks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
