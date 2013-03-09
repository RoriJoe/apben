<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="span5">

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'nip', array('class' => 'span5', 'maxlength' => 25)); ?>

    <?php echo $form->textFieldRow($model, 'nama', array('class' => 'span5', 'maxlength' => 50)); ?>

    <?php if ($model->isNewRecord): ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 50)); ?>
    <?php else: ?>
        <label>Ganti Password:</label>
        <?php echo $form->passwordField($model, 'password', array('class' => 'span5', 'maxlength' => 50, 'autocomplete' => 'off')); ?>
    <?php endif; ?>

    <?php echo $form->textFieldRow($model, 'telepon', array('class' => 'span5', 'maxlength' => 25)); ?>
    
    <?php echo $form->labelEx($model,'roles'); ?>
    <?php echo CHtml::dropDownList('User[roles_arr][]',@$model->roles_arr[0],User::itemAlias('Roles'), array('class' => 'span5', 'maxlength' => 40)); ?>
    <?php $alias = User::itemAlias('Roles'); $alias = array_merge(array(""=>"----"),$alias); ?>
    <?php echo CHtml::dropDownList('User[roles_arr][]',@$model->roles_arr[1],$alias, array('class' => 'span5', 'maxlength' => 40)); ?>
    <?php echo CHtml::dropDownList('User[roles_arr][]',@$model->roles_arr[2],$alias, array('class' => 'span5', 'maxlength' => 40)); ?>
    <?php echo CHtml::dropDownList('User[roles_arr][]',@$model->roles_arr[3],$alias, array('class' => 'span5', 'maxlength' => 40)); ?>
    <?php echo CHtml::dropDownList('User[roles_arr][]',@$model->roles_arr[4],$alias, array('class' => 'span5', 'maxlength' => 40)); ?>
</div>
<div class="clearfix"></div>
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
