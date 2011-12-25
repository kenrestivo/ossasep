<h1>Signup Sheet</h1>

<?php 
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.masonry.min.js');
?>


<script type="text/javascript">

$(function(){
  $('#masonry').masonry({
    // options
    itemSelector : '.emailable',
    columnWidth : 300
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