
<?php   Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/printabletable.css', 'print'); ?>

<h1>Signup Form (checkboxes)</h1>

<div class="span-17">
</div>


<div class="clear"></div>

<div class="span-8">


<?php 
    $this->renderPartial(
        '_checkbox_table',
        array('classes' => $classes[0]));
?>

</div>


<div class="span-8 last">


<?php 
    $this->renderPartial(
        '_checkbox_table',
        array('classes' => $classes[1]));
?>

</div>

<div class="clear"></div>
