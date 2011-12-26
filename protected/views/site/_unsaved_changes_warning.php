
<?php Yii::app()->clientScript->registerCoreScript("jquery") ?>

<script type="text/javascript">
          jQuery(function($) {

    $(window).bind('beforeunload', function() {
	    return 'Check for Unsaved Changes first!';
    });
	$("<?= $form_id ?>").submit(function(){
            $(window).unbind("beforeunload");
});
              })
</script>