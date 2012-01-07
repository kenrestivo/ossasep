

<table style="items">
     <tr><th>Class</th><th>Status</th><th>Amount Receivable</th></tr>


     <?php 

     $students = array();
foreach($model->sortedSignups as $s){
    $owed = $s->owed;
    if($owed != 0){
        $students[] = $s->student;
        echo '<tr><td>' . CHtml::encode($s->student->summary) . "</td><td>". $s->status . "</td><td>" . Yii::app()->format->currencyZero($s->owed) . "</td></tr>";
    }
 }

    ?>

        </table>
