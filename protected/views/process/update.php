<?php
  if ($model->process_id != null)
  {
    $father_process = $this->loadModel($model->process_id);
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'),$father_process->title => array($model->process_id),$model->title);
  }
  else
  {
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'), $model->title=>array('view','id'=>$model->id), Yii::t('sagq', 'Update'),);
  }

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>