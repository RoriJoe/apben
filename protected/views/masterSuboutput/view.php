<?php
$this->breadcrumbs=array(
	'Master Suboutputs'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterSuboutput','url'=>array('index')),
	array('label'=>'Create MasterSuboutput','url'=>array('create')),
	array('label'=>'Update MasterSuboutput','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MasterSuboutput','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterSuboutput','url'=>array('admin')),
);
?>

<h1>View MasterSuboutput #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-output-grid',
    'type' => 'striped, bordered, condensed',
	'dataProvider'=>$dataProvider,
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
	),
)); ?>
