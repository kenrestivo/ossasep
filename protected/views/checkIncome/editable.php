<h3>Shows only checks with no payer (for now)</h3>
<p>
<?php
echo CHtml::link(CHtml::encode("Refresh to get just the empty payers"), 
                 array("CheckIncome/editable",
                       ));
?>
</p>

<?php Yii::app()->clientScript->registerCoreScript("jquery")?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/static/jquery.jeditable.mini.js")?>

<table class="bordertable financial">
<tr><th>Check Num</th><th>Check Date</th><th>Payer (click to edit)</th><th>Student(s)</th></tr>
<?php
foreach($models as $model){
      echo '<tr><td>' . CHtml::encode($model->check_num) . '</td>';
      echo '<td>' . Yii::app()->format->date($model->check_date). '</td>';
      echo '<td class="edit" id="'. $model->id  . '">' . CHtml::encode($model->payer) . '</td>';
      echo '<td>'. '</td>';
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
                        name : 'CheckIncome[payer]',
                        id: 'CheckIncome[id]',
                        style  : "inherit"
                        });
        });

</script>