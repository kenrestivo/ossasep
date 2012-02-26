<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
     <div id="logo"><img src="<?= Yii::app()->request->baseUrl; ?>/images/header.jpg" alt="header" />&nbsp;<?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/')),
				array('label'=>'Schedule', 'url'=>array('/Report/weekday')),
				array('label'=>'Descriptions', 'url'=>array('/Report/descriptions')),
				array('label'=>'Enrollment Status', 'url'=>array('/Report/signupsPublic')),

                //TODO: make this clickable/changable
				array('label'=>CHtml::encode($this->savedSessionSummary()),
                      'url'=>array('/ClassSession/ChooseSession',
                                   'returnTo' => Yii::app()->request->requestUri
), 
                    ),

				array('label'=>'Login', 
                      'url'=>array('/site/login'), 
                      'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 
                      'url'=>array('/site/logout'), 
                      'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->


<div id="breadcrumbs">
<?php $this->widget('application.extensions.breadcrumbs.BreadCrumb', array(
  'newCrumb' =>
    array(
        'name' => 
        isset($this->crumbTitle) ? $this->crumbTitle : $this->getPageTitle(), 
        'url' => Yii::app()->request->requestUri),
  'delimiter' => " >> "
)); ?>
</div>
<?php
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages) {
    echo '<ul class="flashes">';
    foreach($flashMessages as $key => $message) {
        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
    }
    echo '</ul>';
}
?>


	<?php echo $content; ?>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>