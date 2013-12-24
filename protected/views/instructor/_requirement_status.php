<table class="bordertable">
     <tr>
<?php 
// column headings
$reqs=$model->instructor_type->requirements;
foreach($reqs as $r){ 
    echo '<th>' . $r->description . "</th>";
}
echo '</tr><tr>';

// the actual requirements
$rs = $model->requirement_status;
foreach($reqs as $r){ 
    // XXX this smells very bad
    // shouldn't this be done with sql instead? or a relation?
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
