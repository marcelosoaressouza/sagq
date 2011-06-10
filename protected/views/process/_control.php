<?php
if(!Yii::app()->user->isGuest)
{
    echo '<div class="processes_options">';
    echo CHtml::link('<img src="/images/icon-requirement.png" title="'.Yii::t('sagq', 'Add Requirement').'"/></a>' ,'/requirement/create/'.$data->id, array('class'=>'requirement-button'));
    echo CHtml::link('<img src="/images/icon-flowchart.png" title="'.Yii::t('sagq', 'Flowchart').'"/></a>' , '/process/flowChart/'.$data->id, array('class'=>'flowchart-button'));
    echo CHtml::link('<img src="/images/icon-edit.png" title="'.Yii::t('sagq', 'Update').'"/></a>'   ,'/process/update/'.$data->id, array('class'=>'edit-button'));
    echo CHtml::link('<img src="/images/icon-remove.png" title="'.Yii::t('sagq', 'Delete').'"/></a>' ,'/process/delete/'.$data->id, array('class'=>'delete-button'));
    echo '</div>';
}
else
{
    echo '<br/>';        
}
?>