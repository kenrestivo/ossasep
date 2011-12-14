<?php

class KFormatter extends CFormatter
{

	public $dateFormat='m/d/y';
	public $booleanFormat=array('','Yes');
	public $timeFormat='g:i a';
	public $datetimeFormat='m/d/y g:i:s A';


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


    /* 
       Changes 0 to K, adds subscripts
    */
    static public function formatGrade($grade)
    {
        // This from wikipedia:
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if (($grade % 100) >= 11 && ($grade % 100) <= 13)
            $abbreviation = $grade. 'th';
        else
            $abbreviation = $grade. $ends[$grade % 10];

        return $grade > 0 ? $abbreviation : 'K';
    }


}