
<hr/>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'dipa-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="row" style="float:left;margin-left:0px;">
    <?php
    echo $form->dropDownListRow($model, 'tahun_anggaran', array(
        '2013' => '2013',
        '2014' => '2014',
        '2015' => '2015',
        '2016' => '2016',
        '2017' => '2017',
        '2018' => '2018',
        '2019' => '2019',
        '2020' => '2020'
            ), array('class' => 'span1'));
    ?>
</div>
<div class="row span2">
    <?php echo $form->textFieldRow($model, 'tanggal_dipa', array('class' => 'span2')); ?>
</div>
<div class="row span3">
    <?php echo $form->textFieldRow($model, 'nomor_dipa', array('class' => 'span3', 'maxlength' => 30)); ?>
</div>
<div class="clearfix"></div>

<?php echo $form->textFieldRow($model, 'satker', array('class' => 'span7', 'maxlength' => 255)); ?>

<div class="clearfix"></div>

<div class="row span1" style="margin-left:0px;">
<?php echo $form->textFieldRow($model, 'kode_kegiatan', array('class' => 'span1', 'maxlength' => 255)); ?>
</div>

<div class="row span6">
<?php echo $form->textAreaRow($model, 'kegiatan', array('class' => 'span6', 'maxlength' => 255)); ?>
</div>

<div class="clearfix"></div>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Submit DIPA Baru' : 'Simpan',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
