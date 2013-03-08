<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dipa_uid')); ?>:</b>
	<?php echo CHtml::encode($data->dipa_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dipa_version')); ?>:</b>
	<?php echo CHtml::encode($data->dipa_version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mak_uid')); ?>:</b>
	<?php echo CHtml::encode($data->mak_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian')); ?>:</b>
	<?php echo CHtml::encode($data->uraian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan_volume')); ?>:</b>
	<?php echo CHtml::encode($data->satuan_volume); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('frequensi')); ?>:</b>
	<?php echo CHtml::encode($data->frequensi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan_frequensi')); ?>:</b>
	<?php echo CHtml::encode($data->satuan_frequensi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarif')); ?>:</b>
	<?php echo CHtml::encode($data->tarif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::encode($data->uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trash')); ?>:</b>
	<?php echo CHtml::encode($data->trash); ?>
	<br />

	*/ ?>

</div>