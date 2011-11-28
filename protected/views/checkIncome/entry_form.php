<?php 

return array(
    'title'=>'Enter a check',
 
    'elements'=>array(
        'check'=> array(
            'type'=>'form',
            'title'=>'Check',
            'elements'=>array(
                'amount'=>array(
                    'type'=>'text',
                    'maxlength'=>20,
                    ),
                'check_num'=>array(
                    'type'=>'text',
                    'maxlength'=>10,
                    ),
                ),
            ),
        'income'=>array(
            'type'=>'form',
            'title'=>'Apply Payment',
            'elements'=>array(
                'student_id' => array(
                    'maxlength'=>10,
                    'items' => CHtml::listData(Student::model()->findAll(),
                                               'id', 'full_name'),
                    'type'=> 'dropdownlist',
                    ),
                'class_id' => array(
                    'maxlength'=>10,
                    'items' => CHtml::listData(ClassInfo::model()->findAll(), 
                                               'id', 'class_name'),
                    'type'=> 'dropdownlist',
                    ),
                'amount' => array(
                    'type'=> 'text',
                    'maxlength'=>10,
                    ),
                ),
            ),
        ),
    'buttons'=>array(
        'entry_form'=>array(
            'type'=>'submit',
            'label'=>'Save', //TODO: or create
            ),
        ),
    );

?>