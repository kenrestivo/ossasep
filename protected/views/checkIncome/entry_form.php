<?php 

return array(
    'title'=>'Enter a check',
 
    'elements'=>array(
        'check'=> array(
            'type'=>'form',
            'title'=>'Check Details',
            'elements'=>array(
                'amount'=>array(
                    'type'=>'text',
                    'maxlength'=>20,
                    ),
                'check_num'=>array(
                    'type'=>'text',
                    'maxlength'=>10,
                    ),
                'check_date'=>array(
                    'type'=>'text',
                    'maxlength'=>14,
                    ),
                'payee'=>array(
                    'type'=>'text',
                    'maxlength'=>128,
                    ),
                'payer'=>array(
                    'type'=>'text',
                    'maxlength'=>128,
                    ),
                'deposit_id' => array(
                    'maxlength'=>10,
                    'items' => CHtml::listData(
                        DepositDetails::model()->findAll(), 
                        'id', 'deposited_date'),
                    'type'=> 'dropdownlist',
                    ),
                ),
            ),
        'income'=>array(
            'type'=>'form',
            'title'=>'Apply Payment',
            'elements'=>array(
                'student_id' => array(
                    'maxlength'=>10,
                    'prompt' => "Choose student...",
                    'items' => CHtml::listData(Student::model()->findAll(),
                                               'id', 'full_name'),
                    'type'=> 'dropdownlist',
                    ),
                'class_id' => array(
                    'maxlength'=>10,
                    'prompt' => "Choose class...",
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