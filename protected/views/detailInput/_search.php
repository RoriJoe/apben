<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dipa_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dipa_version',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mak_uid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'uraian',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'volume',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'satuan_volume',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'frequensi',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'satuan_frequensi',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'tarif',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jumlah',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'uid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'version',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
