<!-- TODO: do not hard code this, put it in the database -->

<?= CHtml::link(CHtml::encode("Signup Form (PDF) ") . 
                '<img src="images/pdficon_small.gif" alt="PDF" />' , 
                Yii::app()->baseUrl . "/static/Spring2012SignUp.pdf"); ?>
