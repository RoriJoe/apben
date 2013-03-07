<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'output-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterOutput::getDropDownList(), array('class' => 'span5', 'maxlength' => 25));
?>

<?php echo $form->textFieldRow($model, 'satuan_target'); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Rekam Suboutput' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
