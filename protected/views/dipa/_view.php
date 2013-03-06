<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satker')); ?>:</b>
	<?php echo CHtml::encode($data->satker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_dipa')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_dipa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_dipa')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_dipa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />


</div>