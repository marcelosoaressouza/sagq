<?php
    $this->breadcrumbs=array(Yii::t('sagq', 'Requirement')=>array('/process/index'),Yii::t('sagq', 'Create'),);
?>

<?php
    echo $this->renderPartial('_form', array('model'=>$model, 'allRequirements' => $allRequirements));
?>