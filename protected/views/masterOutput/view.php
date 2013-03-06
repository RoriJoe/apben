<?php
$this->breadcrumbs=array(
	'Master Outputs'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterOutput','url'=>array('index')),
	array('label'=>'Create MasterOutput','url'=>array('create')),
	array('label'=>'Update MasterOutput','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MasterOutput','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterOutput','url'=>array('admin')),
);
?>

<h1>View MasterOutput #<?php echo $model->uid; ?></h1>

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
