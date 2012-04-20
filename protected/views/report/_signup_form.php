<!-- TODO: do not hard code this, put it in the database -->

<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupboxes">Signup Form</a>

<?= CHtml::link(CHtml::encode("(PDF)") . 
                '<img src="' . Yii::app()->baseUrl . '/images/pdficon_small.gif" alt="PDF" />' , 
                Yii::app()->baseUrl . "/static/Spring2012SignUp.pdf"); ?>
