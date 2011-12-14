<?php

class KFormatter extends CFormatter
{

	public $dateFormat='m/d/y';
	public $booleanFormat=array('','Yes');

    public function formatDate($value)
    {
        if (! is_numeric($value)) {$value = strtotime($value);}
        return parent::formatDate($value);
    }

    public function formatTime($value)
    {
        if (! is_numeric($value)) {$value = strtotime($value);}
        return parent::formatTime($value);
    }

    public function formatDatetime($value)
    {
        if (! is_numeric($value)) {$value = strtotime($value);}
        return parent::formatDateTime($value);
    }


}