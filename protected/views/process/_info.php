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
                    echo '<b>'.Yii::t('sagq', 'Requirement').' ('.$data->title.'): </b>'.CHtml::link(Yii::app()->CleanHTML->cleanAll($requirement->desc, 96).' ('.Yii::t('sagq', 'Read More').')', '/requirement/viewBox/'.$requirement->id, array('class'=>'box'));
                    echo $this->statusImage[$requirement->status];
                    
                    if (count($requirement->attachments) > 0)
                    {
                        echo '('.count($requirement->attachments).' '.Yii::t('sagq', 'Attachments').')';
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


	?>

	<?php
	if (!empty($data->processes))
	{
		$msg = Yii::t('sagq', 'This process has').' '.count($data->processes).' '.Yii::t('sagq', 'children processes');
        	Yii::app()->clientScript->registerScript('processes-'.$data->id,"$('.processes-button-".$data->id."').click(function(){ $('.processes-list-".$data->id."').toggle(); return false; });");

		echo '<div class="requirement_info">'.CHtml::link($msg,'#',array('class'=>'processes-button-'.$data->id)).'</div>';
	        echo '<div class="processes-list-'.$data->id.'" style="display:none">';
	        foreach ($data->processes as $processes)
	        {
                    echo '<hr/>';
	            echo '<li>';
                    echo '<b>'.Yii::t('sagq', 'Child Process').' ('.$data->title.'): </b>'.CHtml::link(Yii::app()->CleanHTML->cleanAll($processes->title, 96).' ('.Yii::t('sagq', 'Read More').')', '/process/view/'.$processes->id, array('class'=>'edit-button'));
                    echo $this->statusImage[$processes->status];
                    
                    if (count($processes->requirements) > 0)
                    {        
                        echo '<br/><b>'.Yii::t('sagq', 'This process has').' '.count($processes->requirements).' '.Yii::t('sagq', 'requirements').'</b>';
                        
                        foreach ($processes->requirements as $processes_requirement)
                        {
                            echo '<ul><li class="li-requirement">';
                            echo '<b>'.Yii::t('sagq', 'Requirement').' ('.$processes->title.'): </b>'.CHtml::link(Yii::app()->CleanHTML->cleanAll($processes_requirement->desc, 96).' ('.Yii::t('sagq', 'Read More').')', '/requirement/viewBox/'.$processes_requirement->id, array('class'=>'box'));
                            echo $this->statusImage[$processes_requirement->status];
                            
                            if (count($processes_requirement->attachments) > 0)
                            {
                                echo '('.count($processes_requirement->attachments).' Anexos)';
                            }
                            
                            echo '</li></ul>';
                        }
                    }
                    
                    if (count($processes->processes) > 0)
                    {        
                        echo '<b>'.Yii::t('sagq', 'This process has').' '.count($processes->processes).' '.Yii::t('sagq', 'children processes').'</b>';
                        
                        foreach ($processes->processes as $processes_process)
                        {
                            echo '<ul><li class="li-processes">';
                            echo '<b>'.Yii::t('sagq', 'Child Process').' ('.$processes->title.'): </b>'.CHtml::link(Yii::app()->CleanHTML->cleanAll($processes_process->title, 96).' ('.Yii::t('sagq', 'Read More').')', '/process/view/'.$processes_process->id, array('class'=>'edit-button'));
                            echo $this->statusImage[$processes_process->status];
                            echo '</li></ul>';
                        }
                    }
                    
                    echo '</li>';
	        }
                echo '<br/>';
	        echo '</div>';

	}
	else
	{
		echo '<div class="requirement_info">'.Yii::t('sagq', 'No processes(s) child').'</div>';
	}
	echo "<br/>";
	?>
