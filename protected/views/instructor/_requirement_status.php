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
    $s=$this->subById($rs,  
                      array('instructor_id' => $model->id,
                            'requirement_type_id' => $r->id
                          ));
    $this->renderPartial("/requirementStatus/_cell", 
                         array('model' => $s));


}
?>
</tr>
</table>