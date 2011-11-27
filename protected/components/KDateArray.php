<?php

class KDateArray extends CComponent {

// via http://boonedocks.net/mike/archives/137-Creating-a-Date-Range-Array-with-PHP.html
// modified kr 11/26/11

    public static function createWeekdayRangeArray($strDateFrom,$strDateTo) {


        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.


        $aryRange=array();

        $iDateFrom=strtotime($strDateFrom);
        $iDateTo=strtotime($strDateTo);

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


  }
?>