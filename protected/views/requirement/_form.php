<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'requirement-form',
	'enableAjaxValidation'=>false,
)); ?>

        <br/>
        <p class="note"><?php echo Yii::t('sagq', 'Fields with'); ?><span class="required">*</span> <?php echo Yii::t('sagq', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
                <?php echo $form->labelEx($model,'process_id'); ?><br/>
                <?php
                    echo '&nbsp;';
                    echo $model->isNewRecord ? Process::model()->findByPk($_GET['id'])->title : Requirement::model()->findByPk($_GET['id'])->process->title;
                ?>
                <?php $process = $model->isNewRecord ? array('value' => $_GET['id']) : array('value' => $model->process_id); ?>
                <?php echo $form->hiddenField($model, 'process_id', $process);?>
                <?php echo $form->error($model,'process_id'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>16, 'cols'=>64)); ?>
		<?php echo $form->error($model,'desc'); ?>
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

	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('sagq', 'Create') : Yii::t('sagq', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->