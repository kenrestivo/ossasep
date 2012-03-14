<?php

class KFormatter extends CFormatter
{

	public $dateFormat='m/d/y';
	public $booleanFormat=array('','Yes');
	public $timeFormat='g:i a';
	public $datetimeFormat='m/d/y g:i:s A';


    public function formatDate($value)
    {
        if (! is_numeric($value)) {
            $value = strtotime($value);
        }
        // don't show stupid dates
        if($value < 1){
            return '';
        } else{
            return parent::formatDate($value);
        }
    }

    public function formatTime($value)
    {
        if (! is_numeric($value)) {$value = strtotime($value);}
        return parent::formatTime($value);
    }

    public function formatDatetime($value)
    {
        if (! is_numeric($value)) {$value = strtotime($value);}
        if($value < 1){
            return '';
        } else{
            return parent::formatDateTime($value);
        }
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


   static public function formatGradeShort($grade)
    {
        return $grade > 0 ? $grade : 'K';
    }


    public function formatNoZero($value)
    {
        return $value < 1 ? '' : $this->formatNumber($value);
    }


    public function formatPercent($value){
        return $this->formatNumber($value) . '%';
    }

    public function formatCurrency($value)
    {
        //TODO: usse CNumberFormatter to put in stuff.
        return  $value == 0 ? '' : '$' . $this->formatNumber($value);
    }

    public function formatCurrencyZero($value)
    {
        //TODO: use CNumberFormatter to put in stuff.
        return  '$' . $this->formatNumber($value);
    }

    public function formatMonthName($value)
    {
        return date("F", mktime(0, 0, 0, $value, 10));
    }

}