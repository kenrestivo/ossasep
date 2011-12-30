class compositeUnique extends CValidator
{
    
    protected function validateAttribute($object,$attribute)
    {

        $found = Signup::model()->findByPk($object->primaryKey);
        if($found){
            $err = isset($params['error_message']) ? 
                $object->evaluateExpression($params['error_message'], 
                                          array('data' => $found)): 
                'Duplicate, Entry already exists';
            if(is_array($object->primaryKey)){
                foreach($object->primaryKey as $k => $v){
                    $object->addError($object, $k, $err);
                }
            } else {
                //XXX this is realy dead code, will i use this with non-composite?
                $object->addError($object, $attribute, $err);
            }
        }

    }

}