<h1>Check Entry</h1>
 
<div class="form">
     <?php echo $form; ?>
</div>

<?php Yii::app()->clientScript->registerCoreScript("jquery")?>

<script type="text/javascript">
     jQuery(function($) {

             $('input#CheckIncome_amount').change(function(){
                     $('input#Income_amount').val($(this).val());
                 })
                 });

</script>