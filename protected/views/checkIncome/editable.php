
<?php Yii::app()->clientScript->registerCoreScript("jquery")?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/static/jquery.jeditable.mini.js")?>


<div class="edit" id="div_1">Dolor</div>
<div class="edit_area" id="div_2">Lorem ipsum dolor sit amet, consectetuer 
adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
magna aliquam erat volutpat.</div>

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