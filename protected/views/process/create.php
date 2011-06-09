<?php
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'),Yii::t('sagq', 'Create'),);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'processes' => $processes)); ?>
