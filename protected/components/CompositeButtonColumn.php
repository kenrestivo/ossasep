<?php
/**
 * ButtonColumn class file.
 * ButtonColumn is a simple extension of CButtonColumn.
 * It correctly sets button URLs in the following cases:
 * * data has composite primary keys;
 * * data model does not belong to current controller.
 *
 * @author Jeff Soo
 */

class CompositeButtonColumn extends CButtonColumn
{
    public $modelClassName = "";
	protected function initDefaultButtons()
	{	
        if($this->modelClassName != ""){
            $modelClass= $this->modelClassName;
        } else {
            $modelClass=$this->grid->dataProvider->modelClass;
        }
		$controller=strtolower($modelClass);

		if(is_array($modelClass::model()->primaryKey))
			$paramExpression='",$data->primaryKey)';
		else
			$paramExpression='",array("id"=>$data->primaryKey))';

		foreach(array('view','update','delete') as $id)
			$this->{$id.'ButtonUrl'}= 
			    'Yii::app()->urlManager->createUrl("'."$controller/$id$paramExpression";
		parent::initDefaultButtons();
	}
}
