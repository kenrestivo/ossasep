<?php 

return array(
    'title'=>'Enter a check',
 
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
 
    'buttons'=>array(
        'entry_form'=>array(
            'type'=>'submit',
            'label'=>'Save', //TODO: or create
        ),
    ),
);

?>