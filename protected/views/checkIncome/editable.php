
<?php Yii::app()->clientScript->registerCoreScript("jquery")?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/static/jquery.jeditable.mini.js")?>

<table class="bordertable">
<tr><th>Check Num</th><th>Payer (click to edit)</th><th>Student(s)</th></tr>
<?php
foreach($models as $model){
      echo '<tr><td>' . $model->check_num . '</td><td>' . $model->payer . '</td>';
      echo '<td></td>';
      echo '</tr>';
}

?>

</table>

<script type="text/javascript">
	jQuery(function($) {
            $('.edit').editable(
                '<?= $this->createUrl('CheckIncome/jsonUpdate') ?>', 
                {
                indicator : "<img src='<?= Yii::app()->baseUrl ?>/images/indicator.gif'>",
                        tooltip   : "Click to edit...",
                        style  : "inherit"
                        });
        });

</script>