<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name' => 'status', 'value' => $this->status[$model->status]),
		array('name' => 'desc', 'value' => $model->desc, 'type'=> 'html'),
		array('name' => 'user_id', 'value' => $model->author->username, 'type'=> 'html'),
		array('name' => 'created', 'value' => date("d-m-Y H:i", strtotime($model->created))),

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