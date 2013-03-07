<?php
$this->breadcrumbs=array(
	'Outputs',
);

$this->menu=array(
	array('label'=>'Create Output','url'=>array('create')),
	array('label'=>'Manage Output','url'=>array('admin')),
);
?>

<h1>Outputs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
