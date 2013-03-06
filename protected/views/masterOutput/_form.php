<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'master-output-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kode',array('class'=>'span1','maxlength'=>25)); ?>

	<?php echo $form->textAreaRow($model,'uraian',array('class'=>'span5','maxlength'=>255)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
