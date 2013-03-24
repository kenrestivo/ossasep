
<?php 
 // TODO: do not hard code this, put it in the database 
$show_pdf = false; 
?>

<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupboxes">Signup Form</a>

<?php if ($show_pdf) {
		 echo CHtml::link(CHtml::encode("(PDF)") . 
                '<img src="' . Yii::app()->baseUrl . '/images/pdficon_small.gif" alt="PDF" />' , 
                Yii::app()->baseUrl . "/static/signup.pdf");
	 }
 ?>
