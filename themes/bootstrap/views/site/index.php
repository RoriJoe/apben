<?php

/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php

$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Selamat datang ',
));
?>

<p>Berikut ini adalah ringkasan laporan realisasi anggaran tahun <?php echo $dipa->tahun_anggaran; ?>:</p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'data-grid',
	'dataProvider'=>$dataProvider,
    'summaryText' => '',
    'columns' => array(
        array(
            'name' => 'kode',
            'header' => 'Kode'
        ),
        array(
            'header' => 'Uraian',
            'value' => '($data["kode"] == "51" ? "Belanja Pegawai" : ($data["kode"] == "52" ? "Belanja Bahan" : "Belanja Modal"))'
        ),
        array(
            'value' => 'Format::currency($data["jumlah"])',
            'header' => 'Jumlah',
        ),array(
            'name' => 'sumber_dana',
            'header' => 'Sumber Dana'
        )
    )
)); ?>

<?php $this->endWidget(); ?>
