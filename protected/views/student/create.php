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

            fieldmap = { 
                'last_name' : 'last_name',
                'first_name' : 'first_name',
                'grade' : 'grade',
                'phone' : 'emergency_1',
                'cell_parent_1' : 'emergency_2',
                'cell_parent_2' : 'emergency_3',
                'email_parent_1' : 'parent_email',
            };


            function populate(data){
                for(rfield in fieldmap){
                    $('#test').append(data[rfield] + '<br />');
                }
                
            }


            get_rasta = function (num){
                $.ajax({
                    url: "<?php echo $this->createUrl('roster/json')?>/" + num,
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                            $('#test').html(data.first_name + " " + data.last_name);
                            populate(data);
}
                    });
            }
            $('#importer').click(function(){
                    get_rasta($("#rasta option:selected").val()); 
                    return false
                        })
        });
</script>


<?php
echo CHtml::link("Import", '#', array('id' => 'importer'));
?>