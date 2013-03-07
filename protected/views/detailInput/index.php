<?php
$this->breadcrumbs=array(
	'Detail Inputs',
);

$this->menu=array(
	array('label'=>'Create DetailInput','url'=>array('create')),
	array('label'=>'Manage DetailInput','url'=>array('admin')),
);
?>

<h1>Detail Inputs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
