<h3>Multi entry of classes for <?= $student->summary ?></h3>


<table>

<?php echo $this->renderPartial('_row', array('student'=>$student)); ?>

</table>