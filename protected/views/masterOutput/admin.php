<?php
$this->breadcrumbs=array(
	'Master Outputs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create MasterOutput','url'=>array('create')),
);

?>

<h1 style="">Master Output</h1>


<?php $this->widget('ext.apben.RevisionGridView',array(
	'id'=>'master-output-grid',
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
