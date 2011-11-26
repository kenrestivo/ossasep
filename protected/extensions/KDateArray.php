<?php

class KDateArray {

// via http://boonedocks.net/mike/archives/137-Creating-a-Date-Range-Array-with-PHP.html

    public static function createWeekdayRangeArray($strDateFrom,$strDateTo) {


        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.


        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     
                          substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     
                        substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom) {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

            while ($iDateFrom<$iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                $wd=date("N", $iDateFrom);
                // i only want the weekdays
                if($wd > 0 && $wd < 6){
                    array_push($aryRange,date('Y-m-d',$iDateFrom));
                }
            }
        }
        return $aryRange;

    }



    ?>