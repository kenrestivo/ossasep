<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 
?>
<h1>After-School Enrichment Program – <?= $this->savedSessionSummary() ?></h1>


<?php
    // XXX this is stupid, move this to a controller, 
// deal with the whole persomnalized home page thing better
        $cs = ClassSession::model()->findByPk(
            ClassSession::savedSessionId());
		$this->renderPartial(
            '/admin/signupsheet',
            array(
                'classes' => $cs->active_classes));
?>
