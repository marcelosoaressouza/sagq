<?php

if(!Yii::app()->user->isGuest)
{
	echo '<div class="processes_options">';
        echo CHtml::link('<img src="/images/icon-edit.png" title="'.Yii::t('sagq', 'Update').'"/></a>'   ,'/requirement/update/'.$data->id, array('class'=>'edit-button'));
	echo CHtml::link('<img src="/images/icon-remove.png" title="'.Yii::t('sagq', 'Delete').'"/></a>' ,'/requirement/delete/'.$data->id, array('class'=>'delete-button'));
	echo CHtml::link('<img src="/images/icon-attachment.png" title="'.Yii::t('sagq', 'Attach').'"/></a>' ,'/attachment/create/'.$data->id, array('class'=>'attachment-button'));
	echo '</div>';
}
else
{
	echo '<br/>';        
}

?>
