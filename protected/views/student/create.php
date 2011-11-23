<?php Yii::app()->clientScript->registerCoreScript("jquery") ?>

<script type="text/javascript">
      jQuery(
          function($) {
              $('#importer').click(
                  function (){
                      $.ajax({
                          url: "<?= $this->createUrl('import') ?>", 
                                  dataType: "text", 
                                  cache: false, 
                                  success: function(data){
                                  $("#test").html(data)
                                      }}); 
                      return(false);
                  })})

</script>

<?php
$this->menu=array(
    array('label'=>'Manage Students', 
          'url'=>array('admin')),
    array('label'=>'Import From Roster', 
          'url'=> '#',
          'linkOptions' =>array(
              'id' => 'importmenu'
              )
        ));
?>

<h1>Create Student</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<div id="test">test</div>
