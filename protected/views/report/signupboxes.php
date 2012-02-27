<h1>Signup Form (checkboxes)</h1>
<table class="bordertable" >
<tr>
<th class="short">
<?php echo CHtml::encode('√'); ?>
</th>
<th>Class</th>
<th>Payment</th>
</tr>


<?php foreach($classes as $class){ 
    $this->renderPartial(
        '_checkbox_row',
        array('class' => $class));

} 

?>

</table>