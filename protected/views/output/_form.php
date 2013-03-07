<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'output-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterOutput::getDropDownList(), array(
    'class' => 'span5',
    'maxlength' => 25,
    'options' => array($model->kode_uid . '-' . $model->kode => array('selected' => true))
));
?>

<?php echo $form->textFieldRow($model, 'satuan_target'); ?>


<div class="form-actions">
    <?php
    $path = Yii::app()->request->pathInfo . "?dpid=" . $model->dipa_id . "&dpv=" . $model->dipa_version;
    $id = 'Output-' . Helper::rand();
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => array($path),
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Rekam Output' : 'Save',
        'htmlOptions' => array(
            'id' => $id,
        ),
        'ajaxOptions' => array(
            'complete' => 'js:function(data) {
               $(".modal-backdrop").click();
            }'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
