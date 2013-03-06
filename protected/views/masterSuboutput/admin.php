<?php
$this->breadcrumbs=array(
	'Master Suboutputs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterSuboutput','url'=>array('index')),
	array('label'=>'Create MasterSuboutput','url'=>array('create')),
);

?>

<h1>Manage Master Suboutputs</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-suboutput-grid',
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
