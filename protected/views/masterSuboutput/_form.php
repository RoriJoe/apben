<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'master-suboutput-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kode',array('class'=>'span2','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'uraian',array('class'=>'span5','maxlength'=>255)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
