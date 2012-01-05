<h3>Multi entry of classes for <?= $student->summary ?></h3>


<table class="signups">
<tr>
<th>Student</th>
<th>Class</th>
<th>Signup Date</th>
<th>Scholarship</th>
<th>Status</th>
<th>Note</th>
</tr>
<?php echo $this->renderPartial('_row', array('student'=>$student)); ?>

</table>