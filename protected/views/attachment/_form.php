<div class="form">

<?php
$form=$this->beginWidget('CActiveForm', array('action'=> '/attachment/create/'.$_GET['id'],
                                              'method'=> 'post',
                                              'htmlOptions'=> array('enctype'=>'multipart/form-data')
));
?>

        <br/>
        <p class="note"><?php echo Yii::t('sagq', 'Fields with'); ?><span class="required">*</span> <?php echo Yii::t('sagq', 'are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
                <?php echo $form->labelEx($model,'requirement_id'); ?>
                <?php
                    echo '&nbsp;';
                    echo Requirement::model()->findByPk($_GET['id'])->desc;
                ?>
                <?php $requirement = $model->isNewRecord ? array('value' => $_GET['id']) : array('value' => $model->requirement_id); ?>
                <?php echo $form->hiddenField($model, 'requirement_id', $requirement);?>
                <?php echo $form->error($model,'requirement_id'); ?>
        </div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?><br/>
		<?php echo $form->textField($model,'desc',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?><br/>
		<?php echo $form->fileField($model, 'file', array('size'=> 24)); ?>
		<?php echo $form->error($model,'file'); ?>                
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

	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('sagq', 'Create') : Yii::t('sagq', 'Save'), array("class"=>"submit-button")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->