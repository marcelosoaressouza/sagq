<?php
$this->breadcrumbs=array(Yii::t('sagq', 'Processes'),);

?>

<?php
    if(!Yii::app()->user->isGuest)
    {
      echo '<br/><div class="process_options"><a href="/process/create"><img src="/images/icon-add.png" title="'.Yii::t('sagq', 'Create').'"/>'.Yii::t('sagq', 'Add New').'</a></div><br/><br/>';
    }
?>
<h1> <?php echo Yii::t('sagq', 'Processes'); ?> </h1>

<?php $this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'template'=>"{sorter}\n{pager}\n<br/>{items}\n{pager}",
));
?>
