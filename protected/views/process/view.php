<?php
  if ($model->process_id != null)
  {
    $father_process = $this->loadModel($model->process_id);
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'),$father_process->title => array($model->process_id),$model->title);
  }
  else
  {
    $father_process = $this->loadModel($model->id);
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'),$model->title,);
  }
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		array('name' => 'desc', 'value' => $model->desc, 'type'=> 'html'),
		array('name' => 'user_id', 'value' => $model->author->username, 'type'=> 'html'),
		array('name' => 'status', 'value' => $this->status[$model->status]),
		array('name' => 'created', 'value' => date("d-m-Y H:i", strtotime($model->created))),
		array('name' => 'updated', 'value' => date("d-m-Y H:i", strtotime($model->updated))),
		array('name' => Yii::t('sagq', 'Father Process'), 'value' => $father_process->title, 'visible'=>$model->process_id !== null),

        ),
)); ?>
<br/>

<?php
    echo $this->renderPartial('_info', array('data'=>$model));
    echo $this->renderPartial('_control', array('data'=>$model));
    echo "<hr/><br/>";
?>

