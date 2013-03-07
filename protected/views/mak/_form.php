<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'mak-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterMak::getDropDownList(), array('class' => 'span5', 'maxlength' => 25));
?>
<div class="row span2" style="margin-left:0px;width:100px;">
    <?php echo $form->dropDownListRow($model, 'sumber_dana',MasterMak::sumberDanaList(), array('class' => 'span2', 'maxlength' => 25)); ?>
</div>

<div class="clearfix"></div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Submit MAK Baru' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
