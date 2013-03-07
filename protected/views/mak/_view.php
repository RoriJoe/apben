<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dipa_id')); ?>:</b>
	<?php echo CHtml::encode($data->dipa_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dipa_version')); ?>:</b>
	<?php echo CHtml::encode($data->dipa_version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suboutput_uid')); ?>:</b>
	<?php echo CHtml::encode($data->suboutput_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::encode($data->kode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_dana')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_dana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu')); ?>:</b>
	<?php echo CHtml::encode($data->pagu); ?>
	<br />

	<?php /*
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