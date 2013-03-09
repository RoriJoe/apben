<?php
$this->breadcrumbs=array(
	'Tagihan'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tagihan','url'=>array('index')),
	array('label'=>'Create Tagihan','url'=>array('create')),
	array('label'=>'Update Tagihan','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tagihan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tagihan','url'=>array('admin')),
);
?>

<h1>View Tagihan #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_output',
		'kode_suboutput',
		'kode_mak',
		'id_p_ar',
		'tanggal_ar',
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
		'tangal_sp2d',
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
	),
)); ?>
