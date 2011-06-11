<?php
	if (!empty($data->requirements))
	{
		$msg = Yii::t('sagq', 'This process has').' '.count($data->requirements).' '.Yii::t('sagq', 'requirements');
                
        	Yii::app()->clientScript->registerScript('requirement-'.$data->id,"$('.requirement-button-".$data->id."').click(function(){ $('.requirement-list-".$data->id."').toggle(); return false; });");
		echo '<div class="requirement_info">'.CHtml::link($msg,'#',array('class'=>'requirement-button-'.$data->id)).'</div>';
	        echo '<div class="requirement-list-'.$data->id.'" style="display:none">';

	        foreach ($data->requirements as $requirement)
	        {
	            echo '<li class="li-requirement">';
                    echo '<b>'.Yii::t('sagq', 'Requirement').' ('.$data->title.'): </b>'.Yii::app()->CleanHTML->cleanAll($requirement->desc, 96).CHtml::link(' ('.Yii::t('sagq', 'Read More').')', '/requirement/viewBox/'.$requirement->id, array('class'=>'box'));
                    echo $this->statusImage[$requirement->status];
                    if (count($requirement->attachments) > 0)
                    {
                        echo '<br/><b>'.Yii::t('sagq', 'Has').' '.count($requirement->attachments).' '.Yii::t('sagq', 'Attachments').'</b>';
                    }
                    
                    
                    echo '</li>';
	        }
                echo '<br/>';

	        echo '</div>';

	}
	else
	{
		echo '<div class="requirement_info">'.Yii::t('sagq', 'No requirement(s)').'</div>';
	}
        
	echo "<br/>";
?>
