<?php
$this->breadcrumbs=array(
	'Master Maks'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create MasterMak','url'=>array('create')),
);

?>

<h1>Master MAK</h1>

<?php $this->widget('ext.apben.RevisionGridView',array(
	'id'=>'master-mak-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'kode',
            'headerHtmlOptions' => array(
                'style' => 'width:100px;'
            )
        ),
		'uraian',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
