<?php
$this->breadcrumbs=array(
	'Master Outputs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterOutput','url'=>array('index')),
	array('label'=>'Create MasterOutput','url'=>array('create')),
);

?>

<h1 style="">Manage Master Outputs</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-output-grid',
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
