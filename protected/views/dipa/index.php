<?php
$this->breadcrumbs=array(
	'Dipas',
);

$this->menu=array(
	array('label'=>'Create Dipa','url'=>array('create')),
	array('label'=>'Manage Dipa','url'=>array('admin')),
);
?>

<h1>Dipas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
