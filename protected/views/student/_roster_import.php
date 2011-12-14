 
<p> Choose from roster, and click Import to fill in their info</p>

     
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

?>

<br />
<br />

<?php
echo CHtml::button("Import",  array('id' => 'importer'));

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
                'parent_1' : 'contact',
                'cell_parent_1' : 'emergency_2',
                'cell_parent_2' : 'emergency_3',
                'email_parent_1' : 'parent_email',
            };


            function populate(data){
                for(rfield in fieldmap){
                    $('input#Student_' + fieldmap[rfield]).val(data[rfield]);
                }
                
            }


            get_rasta = function (num){
                $.ajax({
                    url: "<?php echo $this->createUrl('roster/json')?>/" + num,
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                            populate(data);
                        }
                    });
            }
            $('#importer').click(function(){
                    get_rasta($("#rasta option:selected").val()); 
                    return false
                        })
                
                $('#rasta').keyup(function(e){
                        if(e.keyCode != 13){
                            return;
                        }
                        get_rasta($("#rasta option:selected").val()); 
                    }
                    );

        });
</script>


<?php
?>