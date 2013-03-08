<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tagihan-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'kode_ouput', MasterOutput::getDropDownList(false), array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->dropDownListRow($model, 'kode_subouput', MasterSuboutput::getDropDownList(false), array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->dropDownListRow($model, 'kode_mak', MasterMak::getDropDownList(false), array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->hiddenField($model, 'id_p_ar', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->labelEx($model, 'tanggal_ar'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_ar'
));
?>

<?php echo $form->hiddenField($model, 'id_p_sptb', array('class' => 'span5', 'maxlength' => 20)); ?>


<?php echo $form->labelEx($model, 'tanggal_sptb'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_sptb'
));
?>

<?php echo $form->textFieldRow($model, 'nomor_sptb', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'nomor_spp', array('class' => 'span5', 'maxlength' => 20)); ?>


<?php echo $form->labelEx($model, 'tanggal_spp'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_spp'
));
?>

<?php echo $form->labelEx($model, 'tanggal_verifikasi'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_verifikasi'
));
?>

<?php echo $form->labelEx($model, 'tanggal_ke_tu'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_ke_tu'
));
?>

<?php echo $form->labelEx($model, 'tanggal_spm'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_spm'
));
?>

<?php echo $form->hiddenField($model, 'id_p_spm', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->hiddenField($model, 'id_p_sp2d', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'nomor_sp2d', array('class' => 'span5', 'maxlength' => 20)); ?>


<?php echo $form->labelEx($model, 'tanggal_sp2d'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_sp2d'
));
?>


<?php echo $form->dropDownListRow($model, 'jenis_tagihan', Tagihan::itemAlias("JenisTagihan"), array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->labelEx($model, 'tanggal_tagihan'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_tagihan'
));
?>


<?php echo $form->textFieldRow($model, 'uraian_tagihan', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'pihak_penerima', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->dropDownListRow($model, 'sumber_dana', Tagihan::itemAlias("SumberDana"), array('class' => 'span5', 'maxlength' => 25)); ?>

<div id="kode_lpk_row">
    <?php echo $form->dropDownListRow($model, 'kode_lpk', Tagihan::itemAlias("KodeLPK"), array('class' => 'span5', 'maxlength' => 20)); ?>
</div>

<?php echo $form->dropDownListRow($model, 'mata_uang', Tagihan::itemAlias("MataUang"), array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'jumlah_tagihan', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'ppn', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'pph_21', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'pph_22', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'pph_23', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'kurs', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->dropDownListRow($model, 'jenis_kurs', Tagihan::itemAlias("JenisKurs"), array('class' => 'span5', 'maxlength' => 25)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $(function() {
        $("#Tagihan_sumber_dana").change(function() {
            if ($(this).val() == "RM") {
                $("#kode_lpk_row").hide();
            } else {
                $("#kode_lpk_row").show();
            }
        }).change();
    });
</script>