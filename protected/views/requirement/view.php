<?php
$this->breadcrumbs=array(
	Yii::t('sagq', 'Requirements') => array('/process/index'),
	Yii::app()->CleanHTML->cleanAll($model->desc, 128),
);
?>
<br/>
<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name' => 'status', 'value' => $this->status[$model->status]),
		array('name' => 'desc', 'value' => $model->desc, 'type'=> 'html'),
		array('name' => 'created', 'value' => date("d-m-Y H:i", strtotime($model->created))),
		array('name' => 'updated', 'value' => date("d-m-Y H:i", strtotime($model->updated))),
		array('name' => 'process_id', 'value' => CHtml::link(CHtml::encode($model->process->title), array('/process/view','id'=>$model->process->id)), 'type'=>'raw'),
	),
));
?>

<?php
    echo "<br/>";
    echo $this->renderPartial('_attachment', array('data'=>$model));
    echo "<br/>";
    echo $this->renderPartial('_control', array('data'=>$model));
    echo "<hr/><br/>";

?>