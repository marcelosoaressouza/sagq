<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo date("d-m-Y H:i", strtotime($data->created)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo date("d-m-Y H:i", strtotime($data->updated)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('process_id')); ?>:</b>
	<?php echo CHtml::encode($data->process_id); ?>
	<br />
</div>