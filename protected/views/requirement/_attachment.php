<?php 
    if (count($data->attachments) > 0)
    {
        echo '<div class="processes_attachments">';
        echo '<b>'.Yii::t('sagq', 'Attachments').' ('.count($data->attachments).'): </b>';
        echo '<ul>';
        foreach ($data->attachments as $attachment)
        {
            echo '<li>'.$attachment->desc.' - <a target="_blank" href="/upload/'.$data->id.'/'.$attachment->file.'">'.$attachment->file.'</a></li>';
            
        }
        echo '</ul>';
        echo '</div>';
    }
    else
    {
        echo '<div class="requirement_info">'.Yii::t('sagq', 'No Attachments').'</div>';
    }
?>