<?php
$this->breadcrumbs=array(
	Yii::t('sagq', 'Attachment'),
	Yii::t('sagq', 'Create'),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>