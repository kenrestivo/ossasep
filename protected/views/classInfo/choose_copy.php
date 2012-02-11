<h3>Choose class to copy from <?= $fromsession->summary ?> to <?= ClassSession::current()->summary ?> </h3>

     <?php
     echo CHtml::form(); 
echo CHtml::dropDownList(
    'ClassInfo[id]', 
    '',
//TODO: let them pick session from a dropdown dammit
    CHtml::listData(ClassInfo::model()->findAll(
                        'session_id = :sid',
                        array('sid' => $fromsession->id)), 
                    'id', 'summary'),
    array('submit' => '',
          'empty' => 'Choose One',
        )) ;

echo CHtml::submitButton('Change'); 

echo CHtml::endForm();
?>
