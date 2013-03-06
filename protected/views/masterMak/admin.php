<?php
$this->breadcrumbs=array(
	'Master Maks'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterMak','url'=>array('index')),
	array('label'=>'Create MasterMak','url'=>array('create')),
);

?>

<h1>Manage Master Maks</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-mak-grid',
    'type' => 'striped, bordered, condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'version',
            'header' => 'Rev.',
            'headerHtmlOptions' => array(
                'style' => 'width:50px;'
            )
        ),
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
