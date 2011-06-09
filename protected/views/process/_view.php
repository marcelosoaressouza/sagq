<div class="view">
	
        
	<?php
            echo '<a href="/process/view/'.$data->id.'"><b>'.substr(CHtml::encode($data->title), 0, 64).'</b></a>';
            echo $this->statusImage[$data->status];
        ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo strip_tags($data->desc); ?>
        
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo $data->author->username; ?>
        
	<br /><br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo date("d-m-Y H:i", strtotime($data->created)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo date("d-m-Y H:i", strtotime($data->updated)); ?>
	<br />
        <br/>
        
        <?php
            echo $this->renderPartial('_info', array('data'=>$data));
            echo $this->renderPartial('_control', array('data'=>$data));
            echo "<hr/><br/>";
        ?>
</div>
