<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'process-form', 'enableAjaxValidation'=>false,)); ?>
        <br/>
        <p class="note"><?php echo Yii::t('sagq', 'Fields with'); ?><span class="required">*</span> <?php echo Yii::t('sagq', 'are required'); ?>.</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?><br/>
		<?php echo $form->textField($model,'title', array('size'=>64,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?><br/>
                <?php echo '&nbsp;'.User::model()->findByPk(Yii::app()->user->id)->getAttribute('username'); ?>
                <?php $author = $model->isNewRecord ? array('value' => Yii::app()->user->id) : array('value' => $model->getAttribute('user_id'));?>
		<?php echo $form->hiddenField($model, 'user_id',  $author);?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?><br/>
		<?php echo $form->textArea($model,'desc',array('rows'=>12, 'cols'=>64)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::activeDropDownList($model, 'status', $this->status);?>
		<?php echo $form->error($model,'status'); ?>
	</div>

        <?php if (($model->isNewRecord) && (count($processes) > 0)) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php
                    $processes = CHtml::listData($processes, 'id', 'title');
                    $processes [0] = Yii::t('sagq', 'Macro Process');
                 ?>
		<?php echo CHtml::activeDropDownList($model, 'process_id', $processes);?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>
        <?php } ?>

        <div class="row">
                <?php $data = $model->isNewRecord ? array('value' => date('Y-m-d H:i:s')) : array('value' => $model->getAttribute('created')); ?>
                <?php echo $form->hiddenField($model, 'created',  $data);?>
                <?php echo $form->error($model,'created'); ?>
        </div>
        
        <div class="row">
                <?php echo $form->hiddenField($model, 'updated', array( 'value' => date('Y-m-d H:i:s')));?>
                <?php echo $form->error($model,'updated'); ?>
        </div>
                
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('sagq', 'Create') : Yii::t('sagq', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
