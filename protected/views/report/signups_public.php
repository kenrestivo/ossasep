<h1>Signup Sheet for <?= $this->savedSessionSummary() ?></h1>

<?php 
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.masonry.min.js');
?>


<script type="text/javascript">

$(function(){
  $('#masonry').masonry({
    // options
    itemSelector : '.emailable',
    columnWidth : 150
  });
});

</script>



<div id="masonry">
<?php
foreach($classes as $class){
    $this->renderPartial(
        '_signup_public',
        array('model' => $class));
}

?>
</div>