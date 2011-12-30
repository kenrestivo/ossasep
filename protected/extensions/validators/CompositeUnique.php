<?php

class CompositeUnique extends CValidator
{
    public $error_message = 'echo "Duplicate, Entry already exists"';

    protected function validateAttribute($object,$attribute)
    {

        $found = Signup::model()->findByPk($object->primaryKey);
        if($found){
            $err= $object->evaluateExpression(
                $this->error_message, 
                array('data' => $found));

            if(is_array($found->primaryKey)){
                foreach($found->primaryKey as $k => $v){
                    $this->addError($object, $k, $err);
                }
            } else {
                //XXX this is realy dead code, will i use this with non-composite?
                $this->addError($object, $attribute, $err);
            }
        }

    }

}