<!-- begin of requirement form -->

<?php
    Yii::app()->clientScript->registerScript('requirement-list',
                                             "$('#type').change(function(){
                                                    if($(this).val() != 1)
                                                    {
                                                        $('#Requirement_new').hide();
                                                        $('#Requirement_old').show();
                                                    }
                                                    else
                                                    {
                                                        $('#Requirement_new').show();
                                                        $('#Requirement_old').hide();
                                                    }
                                                 
                                             });");
 ?>

<div class="form">

<?php
    $action = $model->isNewRecord ? 'create' : 'update';
    $form=$this->beginWidget('CActiveForm', array('action'=> '/requirement/'.$action.'/'.$_GET['id'], 'method'=> 'post'));
?>
        <br/>
        <p class="note"><?php echo Yii::t('sagq', 'Fields with'); ?><span class="required">*</span> <?php echo Yii::t('sagq', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
            <?php
               if (isSet($allRequirements))
               {
                    if (count($allRequirements) > 0)
                    {
                        echo CHtml::label(Yii::t('sagq', 'Requirement'), 'label');
                        echo '<br/>';
                        echo CHtml::dropDownList('type', 'requirement', array('1' => Yii::t('sagq', 'New'), '0' => Yii::t('sagq', 'Old')));
                    }
               }
             ?>
	</div>
        
            <div class="row">
                <?php
                    if ($model->isNewRecord)
                    {
                        echo $form->labelEx($model, Yii::t('sagq', 'Process'));
                        echo '<br/>';
                        echo '&nbsp;';
                        echo Process::model()->findByPk($_GET['id'])->title;
                    }
                ?>
                
            </div>

	<div class="row" id="Requirement_new">
            <div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>16, 'cols'=>64)); ?>
		<?php echo $form->error($model,'desc'); ?>
            </div>
            
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?><br/>
                <?php echo '&nbsp;'.User::model()->findByPk(Yii::app()->user->id)->getAttribute('username'); ?>
                <?php $author = $model->isNewRecord ? array('value' => Yii::app()->user->id) : array('value' => $model->getAttribute('user_id'));?>
		<?php echo $form->hiddenField($model, 'user_id',  $author);?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

            <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model, 'status', $this->status);?>
    		<?php echo $form->error($model,'status'); ?>
            </div>
        
            <div class="row">
                    <?php $data = $model->isNewRecord ? array('value' => date('Y-m-d H:i:s')) : array('value' => $model->getAttribute('created')); ?>
                    <?php echo $form->hiddenField($model, 'created',  $data);?>
                    <?php echo $form->error($model,'created'); ?>
            </div>
        
            <div class="row">
                    <?php echo $form->hiddenField($model, 'updated', array( 'value' => date('Y-m-d H:i:s')));?>
                    <?php echo $form->error($model,'updated'); ?>
            </div>
	</div>
        
	<div class="row" id="Requirement_old" style="display:none">
		<?php echo CHtml::label(Yii::t('sagq', 'Requirement'), 'label'); ?><br/>
		<?php
                    if (isSet($allRequirements))
                    {
                        $allRequirements = array(0 => Yii::t('sagq', 'Choose one')) + CHtml::listData($allRequirements, 'id', 'desc');
                        echo CHtml::dropDownList('requirement_id_old', 'requirement_id_old', $allRequirements);
                    }
                ?>
	</div>
        
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('sagq', 'Create') : Yii::t('sagq', 'Save'), array("class"=>"submit-button")); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- end of requirement form -->
