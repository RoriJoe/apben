<?php
$this->breadcrumbs=array(
	'Tagihans',
);

$this->menu=array(
	array('label'=>'Create Tagihan','url'=>array('create')),
	array('label'=>'Manage Tagihan','url'=>array('admin')),
);
?>

<h1>Tagihans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
