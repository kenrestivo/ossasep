
<div>

<p><em>Required:</em>
<?php foreach($model->instructor_type->requirements as $r){ 
      echo $r->description . ", ";
}
?>
</p>
</div>

