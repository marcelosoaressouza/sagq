<?php
    $this->breadcrumbs=array(Yii::t('sagq', 'Process')=>array('index'),$model->title,);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		array('name' => 'user_id', 'value' => $model->author->username, 'type'=> 'html'),
		array('name' => 'desc', 'value' => $model->desc, 'type'=> 'html'),
		array('name' => 'status', 'value' => $this->status[$model->status]),
		array('name' => 'created', 'value' => date("d-m-Y H:i", strtotime($model->created))),
		array('name' => 'updated', 'value' => date("d-m-Y H:i", strtotime($model->updated)))

        ),
)); ?>
<br/>

<?php
    echo $this->renderPartial('_info', array('data'=>$model));
    echo $this->renderPartial('_control', array('data'=>$model));
    echo "<hr/><br/>";
?>

