<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'suboutput-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterSuboutput::getDropDownList(), array(
    'class' => 'span5', 
    'maxlength' => 25,
    'options' => array($model->kode_uid . '-' . $model->kode =>array('selected'=>true))
    ));
?>
<?php
echo $form->textFieldRow($model, 'target', array(
    'class' => 'span2 pull-left',
    'append' => "<div>{$model->output->satuan_target}</div>"
));
?> 

<div class="clearfix"></div>

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
