<?php
/**
 * ButtonColumn class file.
 * ButtonColumn is a simple extension of CButtonColumn.
 * It correctly sets button URLs in the following cases:
 * * data has composite primary keys;
 * * data model does not belong to current controller.
 *
 * @author Jeff Soo, modified by ken restivo
 */

class CompositeButtonColumn extends CButtonColumn
{
    public $modelClassName = "";
    public $returnTo = "";
	protected function initDefaultButtons()
	{	
        if($this->modelClassName != ""){
            $modelClass= $this->modelClassName;
        } else {
            $modelClass=$this->grid->dataProvider->modelClass;
        }
		$controller=$modelClass; // do not lowercase the names, it breaks

		if(is_array($modelClass::model()->primaryKey)){
            if($this->returnTo != ""){
                $paramExpression='",array_merge($data->primaryKey, array("returnTo" => "' . urlencode($this->returnTo) . '"))';
            } else {
                $paramExpression='",$data->primaryKey';
            }
		} else {
            if($this->returnTo != ""){
                $paramExpression='",array("id"=>$data->primaryKey, "returnTo" => "' . urlencode($this->returnTo) . '")';
            } else {
                $paramExpression='",array("id"=>$data->primaryKey)';
            }
        }

/*
        if(isset($this->returnTo)){
            $paramExpression .= ",'returnTo' => ". "'$this->returnTo'";
        }
*/

        $paramExpression .= ")";

		foreach(array('view','update','delete') as $id){
			$this->{$id.'ButtonUrl'}= 
			    'Yii::app()->urlManager->createUrl("'.
                    "$controller/$id$paramExpression";
        }
		parent::initDefaultButtons();
	}
}
