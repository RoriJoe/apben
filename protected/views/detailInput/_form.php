<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'detail-input-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'uraian', array('class' => 'span5', 'maxlength' => 255)); ?>

<div style="float:left;">
    <?php echo $form->textFieldRow($model, 'volume', array('class' => 'span2', 'maxlength' => 20)); ?>
</div>
<div style="float:left;margin-left:20px;">
    <?php echo $form->textFieldRow($model, 'satuan_volume', array('class' => 'span1', 'maxlength' => 25)); ?>
</div>

<div class="clearfix"></div>

<div style="float:left;">
    <?php echo $form->textFieldRow($model, 'frequensi', array('class' => 'span2', 'maxlength' => 20)); ?>
</div>
<div style="float:left;margin-left:20px;">
    <?php echo $form->textFieldRow($model, 'satuan_frequensi', array('class' => 'span1', 'maxlength' => 25)); ?>
</div>


<div class="clearfix"></div>

<?php echo $form->textFieldRow($model, 'tarif', array('class' => 'span2', 'maxlength' => 20, 'prepend' => '<div>Rp</div>')); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => 'mother',
        'type' => 'danger',
        'label' => $model->isNewRecord ? 'Rekam Detail Input' : 'Save',
        'ajaxOptions' => array(
            'complete' => 'alert("F");'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
