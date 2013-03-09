<?php
$this->breadcrumbs=array(
	'Tagihan'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tagihan','url'=>array('index')),
	array('label'=>'Create Tagihan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tagihan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tagihans</h1>

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
	'id'=>'tagihan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uraian_tagihan',
		'kode_ouput',
		'kode_subouput',
		'kode_mak',
		'tanggal_ar',
		/*
		'id_p_sptb',
		'tanggal_sptb',
		'nomor_sptb',
		'kode_lpk',
		'nomor_spp',
		'tanggal_spp',
		'tanggal_verifikasi',
		'tanggal_ke_tu',
		'id_p_spm',
		'tanggal_spm',
		'tanggal_kirim',
		'id_p_sp2d',
		'tanggal_sp2d',
		'nomor_sp2d',
		'jenis_tagihan',
		'tanggal_tagihan',
		'uraian_tagihan',
		'pihak_penerima',
		'sumber_dana',
		'mata_uang',
		'jumlah_tagihan',
		'ppn',
		'pph_21',
		'pph_22',
		'pph_23',
		'kurs',
		'jenis_kurs',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
