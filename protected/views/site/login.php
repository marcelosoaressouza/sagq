<?php
    $this->pageTitle=Yii::app()->name . ' - '.Yii::t('sagq', 'Login');
    $this->breadcrumbs=array(Yii::t('sagq', 'Login'));
?>

<?php unset ($this->blocks); ?>

<h1><?php echo Yii::t('sagq', 'Login');?></h1>
<center>
<div class="form">
<?php
    $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true, 'clientOptions'=>array('validateOnSubmit'=>true,),));
?>
	<p class="note"><?php echo Yii::t('sagq', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('sagq', 'are required'); ?>.</p>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('sagq', 'Username')) ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('sagq', 'Password')); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model, Yii::t('sagq', 'Remember Me')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('sagq', 'Login')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
    <!-- form -->
</center>
