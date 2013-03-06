<?php
$this->breadcrumbs=array(
	'DIPA'=>array('admin'),
	'Buat DIPA Baru',
);

$model->satker = "Pusat Pendidikan dan Pelatihan Pengembangan Sumber Daya Manusia - BPPK";
$model->kegiatan = "Pengembangan SDM Melalui Penyelenggaran Diklat Kepemimpinan dan Manajemen Serta Pendidikan Pascasarjana Bagi Pegawai Departemen Keuangan";
$model->kode_kegiatan = "1737";
?>

<h1>Buat DIPA Baru</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>