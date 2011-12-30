
<div>

<p><em>Required:</em>

<table class="bordertable">
     <tr>
     <?php 
     $reqs=$model->instructor_type->requirements;
$rs = $model->requirement_status;
foreach($reqs as $r){ 
    echo '<th>' . $r->description . "</th>";
}

echo '</tr><tr>';

foreach($reqs as $r){ 
    echo '<td>';
    $s=$this->subById($rs,  
                      array('instructor_id' => $model->id,
                            'requirement_type_id' => $r->id
                          ));
    if(isset($s)){
        echo Yii::app()->format->date($s->expired);
    }
    echo '</td>';
}
?>
</tr>
</table>
</p>
</div>
