<?php
$this->breadcrumbs=array(
	Yii::t('sagq', 'Process')=>array('index'),
	$model->title=>array('view','title'=>$model->title),
	Yii::t('sagq', 'Update'),
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>