<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="pt-br" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
        
        <script type="text/javascript" src="/3rdparty/tinymce/tiny_mce.js"></script>
        
        <script type="text/javascript">
            tinyMCE.init({ mode : "textareas",
			   language : "pt",
	                   theme : "advanced",
                           theme_advanced_toolbar_location : "top",
                         });
        </script>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/outros.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/process.css" />
        
	<?php
		$cs = Yii::app()->clientScript;  
		$cs->registerCoreScript('jquery');    
		$cs->registerCoreScript('jquery.ui');    
		$cs->registerScriptFile(Yii::app()->baseUrl . '/3rdparty/jquery.alerts/jquery.alerts.js', CClientScript::POS_HEAD);
		$cs->registerCssFile(Yii::app()->baseUrl    . '/3rdparty/jquery.alerts/jquery.alerts.css');
		$cs->registerCssFile(Yii::app()->baseUrl    . '/3rdparty/jquery.fancybox-1.3.1/fancybox/jquery.fancybox-1.3.1.css');
                $cs->registerScriptFile(Yii::app()->baseUrl . '/3rdparty/jquery.fancybox-1.3.1/fancybox/jquery.fancybox-1.3.1.js', CClientScript::POS_HEAD);
                //$cs->registerScriptFile(Yii::app()->baseUrl . '/3rdparty/raphael/raphael-min.js', CClientScript::POS_HEAD);
                $cs->registerScriptFile(Yii::app()->baseUrl . '/js/sagq.js', CClientScript::POS_HEAD);
                $cs->registerScriptFile(Yii::app()->baseUrl . '/3rdparty/raphael/raphael.js');
                $cs->registerScript('delete-button', "$(function() { $('.delete-button').click(function() { return confirm('".Yii::t('sagq', 'Delete this Item?')."'); }); });");
	?>

</head>

<body>
	<div id="grid_header">	
		<div id="top">
                <div id="logo">
                    <a href="/" title="SAGQ"><img src="/images/logo.png" alt="SAGQ title="SAGQ" /></a>
                </div>
			<div id="mainmenu">		        
			  <div id="mainmenu-left"></div>
			  <div id="mainmenu-middle">
			    <?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				array('label' => Yii::t('juntadados', Yii::t('sagq', 'Processes'))     , 'url'=>array('/process/index')),
				array('label' => Yii::t('juntadados', Yii::t('sagq', 'Login'))    , 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label' => Yii::t('juntadados', Yii::t('sagq', 'Logout')).' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			     )); ?>
			  </div>
			  <div id="mainmenu-right"></div>
		        </div>
		</div>

		<div id="separator"></div>
	</div>
        <br/>
	<div id="grid_content">

		<div class="main_content" id="tabs">
		        <!-- breadcrumbs -->
			<?php if(isset($this->breadcrumbs)):?>
		        <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?>
			<?php endif?>
		        <!-- breadcrumbs -->

			<?php echo $content; ?>
		</div>

            <div class="sidebar">
                <br/><br/>
                <?php
                
                if(isSet($this->blocks))
                {
                    echo '<div class="block">';
                    if(isSet($this->blocks)) echo '<center><h2>'.Yii::t('juntadados', 'Last News').'</h2></center>'; 
                    echo '<ul class="block_mais">';
                        $this->widget('zii.widgets.CListView', array('dataProvider'=>$this->blocks, 'itemView'=>'_blockView', 'template'=>"{items}\n{pager}", 'enablePagination' => false));
                    echo '</ul>';
		echo '</div>';
                }
                ?>
            </div>
	</div>


<div id="grid_footer">
	<div class="grid_footer_center">	
		<div class="footer_logo">
                    <p>Sistema de Apoio a Gestão da Qualidade<br />Desenvolvido com o Yii e MySQL<br/>(c) 2011</p><br /><br />

                </div>
	</div>
</div>

</body>
</html>
