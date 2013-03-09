<?php echo CHtml::image($this->createUrl("/static/images/loading.gif"),'loading', array('class'=>'loading','style'=>'position:absolute;')); ?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tagihan-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'style' => 'visibility:hidden;'
    )
        ));
?>

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

<?php echo $form->labelEx($model, 'tanggal_trm_tagihan'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'attribute' => 'tanggal_trm_tagihan'
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

<div id="kurs_container">
    <?php echo $form->textFieldRow($model, 'kurs', array('class' => 'span5', 'maxlength' => 20)); ?>

    <?php echo $form->dropDownListRow($model, 'jenis_kurs', Tagihan::itemAlias("JenisKurs"), array('class' => 'span5', 'maxlength' => 25)); ?>
</div>

<div id="pajak_container">
    <label>Pajak</label>
    <select id="pajak_dropdown" style="width:110px;">
        <option value="pajak">Pajak</option>
        <option value="non_pajak">Non-Pajak</option>
    </select>

    <div id="pajak_subcontainer" class="well well-small">
        <?php echo $form->textFieldRow($model, 'ppn', array('class' => 'span4', 'maxlength' => 20)); ?>
        <div id="pph_row">
            <label>PPh</label>
            <select id="pph_dropdown" style="width:110px;">
                <option value="pph_21">PPh 21</option>
                <option value="pph_22">PPh 22</option>
                <option value="pph_23">PPh 23</option>
                <option value="pph_25">PPh 25</option>
            </select>
            <?php echo $form->textField($model, 'pph_21', array('class' => 'pph span3', 'maxlength' => 20)); ?>
            <?php echo $form->textField($model, 'pph_22', array('class' => 'pph span3', 'maxlength' => 20, 'style' => 'display:none;')); ?>
            <?php echo $form->textField($model, 'pph_23', array('class' => 'pph span3', 'maxlength' => 20, 'style' => 'display:none;')); ?>
            <?php echo $form->textField($model, 'pph_25', array('class' => 'pph span3', 'maxlength' => 20, 'style' => 'display:none;')); ?>
        </div>
    </div>
</div>

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

        if ($(".pph:eq(0)").val() > 0 || $(".pph:eq(1)").val() > 0 || $(".pph:eq(2)").val() > 0
                || $(".pph:eq(3)").val() > 0 || $("#Tagihan_ppn").val() > 0) {
            $("#pajak_dropdown").val("pajak");
        } else {
            $("#pajak_dropdown").val("non_pajak");
        }
        
        $("#pajak_dropdown").change(function() {
            if ($(this).val() == "pajak") {
                $("#pajak_subcontainer").show();
            } else {
                $("#pajak_subcontainer").hide();
                $(".pph,#Tagihan_ppn").val('0');
            }
        }).change();

        $("#pph_dropdown").change(function() {
            $(".pph").hide();
            $("#Tagihan_" + $(this).val()).show();
        });


        $("#Tagihan_mata_uang").change(function() {
            if ($(this).val() == "IDR") {
                $("#kurs_container").hide();
                $("#pajak_container").show();
            } else {
                $("#kurs_container").show();
                $("#pajak_container").hide();
            }
        }).change();
        
        $(".loading").remove();
        $("#tagihan-form").css('visibility','visible');
    });
</script>