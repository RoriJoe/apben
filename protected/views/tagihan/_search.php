<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kode_ouput',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'kode_subouput',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'kode_mak',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'id_p_ar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_ar',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_p_sptb',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_sptb',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nomor_sptb',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kode_lpk',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nomor_spp',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_spp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tanggal_verifikasi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tanggal_ke_tu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_p_spm',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_spm',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tanggal_kirim',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_p_sp2d',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_sp2d',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nomor_sp2d',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jenis_tagihan',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'tanggal_tagihan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'uraian_tagihan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'pihak_penerima',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'sumber_dana',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'mata_uang',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'jumlah_tagihan',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'ppn',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pph_21',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pph_22',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pph_23',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kurs',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jenis_kurs',array('class'=>'span5','maxlength'=>25)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
