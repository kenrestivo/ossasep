<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
    );

$this->menu=array(
	array('label'=>'Manage Students', 
          'url'=>array('admin')),
	array('label'=>'Import From Roster', 
          'url'=>array(
              'import')),

    );
?>

<h1>Create Student</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<p> and now the import</p>

<div id="test">test</div>

    <?php 

    $form=$this->beginWidget('CActiveForm', array(
                                 'id'=>'rasta-import',
                                 'enableAjaxValidation'=>false,
                                 )); 

echo 
CHtml::listBox('rasta', null,
               CHtml::listData(Roster::model()->findAll(), 
                               'id', 'full_name'),
               array('size' => 20)
    );

$this->endWidget();

?>

<?php Yii::app()->clientScript->registerCoreScript("jquery")?>

<script type="text/javascript">
	jQuery(function($) {

            window.get_rasta = function (num){
                $.ajax({
                    url: "<?php echo $this->createUrl('roster/json')?>/" + num,
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                            $('#test').html(data.first_name + " " + data.last_name);
                        }
                    });
            }
        });
</script>


<?php
echo CHtml::link("Import", '#', array('id' => 'importer'));
?>