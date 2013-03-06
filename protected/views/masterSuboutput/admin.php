<?php
$this->breadcrumbs=array(
	'Master Suboutputs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create MasterSuboutput','url'=>array('create')),
);

?>

<h1>Master Suboutput</h1>


<?php $this->widget('ext.apben.RevisionGridView',array(
	'id'=>'master-suboutput-grid',
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
