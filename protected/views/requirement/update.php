<?php
$this->breadcrumbs=array(Yii::t('sagq', 'Requirement')=>array('/process/index'),
	strip_tags(html_entity_decode(substr($model->desc, 0, 128), ENT_QUOTES, 'UTF-8'))=>array('view','id'=>$model->id),
	Yii::t('sagq', 'Update'),
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>