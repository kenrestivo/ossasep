
<?php Yii::app()->clientScript->registerCoreScript("jquery")?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/static/jquery.jeditable.mini.js")?>

<table class="bordertable">
<tr><th>Check Num</th><th>Payer (click to edit)</th><th>Student(s)</th></tr>
<?php
foreach($models as $model){
      echo '<tr><td>' . $model->check_num . '</td><td class="edit" id="'. $model->id  . '">' . $model->payer . '</td>';
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
                        name : 'CheckIncome[payer]',
                        id: 'CheckIncome[id]',
                        style  : "inherit"
                        });
        });

</script>