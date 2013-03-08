<?php
$this->breadcrumbs=array(
	'Detail Inputs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DetailInput','url'=>array('index')),
	array('label'=>'Create DetailInput','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('detail-input-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Detail Inputs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'detail-input-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dipa_uid',
		'dipa_version',
		'mak_uid',
		'uraian',
		'volume',
		/*
		'satuan_volume',
		'frequensi',
		'satuan_frequensi',
		'tarif',
		'jumlah',
		'uid',
		'version',
		'trash',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
