<?php   Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/printabletable.css', 'print'); 
 $reg_begin_tmp =  date("l, F jS \a\\t g:i a", strtotime(ClassSession::current()->registration_starts));

// XXX MOVE THIS TO DB!
$signup_contact_move_to_db = 'Kimberly Repp , via email <a href="mailto:oss.asep@gmail.com">oss.asep@gmail.com</a> or phone 650-575-0616.';
// XXX MOVE THIS TO DB!
$revised_date_move_to_db = "3/24/13";

?>

<div class="span-17">
<h1 class="fakespan-17 center">After-School Enrichment Program – <?= CHtml::encode($this->savedSessionSummary()) ?></h1>

    <h3 class="fakespan-17 center">Classes begin <strong><?= date('F jS', strtotime(ClassSession::current()->start_date)) ?></strong>.<br />
    Reservations begin  <strong> <?= $reg_begin_tmp ?> </strong>!</h3>


<h3>Important Notes about Enrollment Process:</h3>
<ul>
<li>  Many classes fill up quickly! 
<ul><li>
     First come, first served:
    <ul><li>Enrollment is determined by the order in which Patricia, in the front office, receives it.  </li></ul></li></ul></li>
<li> You will receive a school-wide e-mail confirmation to confirm enrollment or a notice in your family folder (for non-computer users.)</li>
<li> Wait-lists do not roll over from the previous sessions.  If your child is placed on a waitlist, you will be notified via email or phone.  You may choose to stay on the waitlist or have your check returned to you.  If you choose to remain on the waitlist, you will be notified if a space becomes available.  You may request to be removed from the waitlist at any time and your check will be returned.</li>
<li> If you write a check for multiple classes, the check will be cashed.  If a class is canceled, a refund check will be written (refunds can take up to two weeks to be processed).</li>
<li> Scholarships are available . Please contact the principal, Karen Gnusti, if you are interested.  Please turn in a form 
with “scholarship pending” listed to hold a spot in a class (especially for classes that sell out quickly).</li>
<li> If a student is interested in a class, but does not fit the grade range or other criteria, please contact an ASEP Coordinator. There are exceptions in some (not all) classes.</li>
	<li>For questions or concerns, please contact the ASEP coordinator,  <?php echo $signup_contact_move_to_db; ?> </li>
</ul>
<p>Revised  <?= $revised_date_move_to_db;  ?>2</p>

</div>

<div class="clear advisorybreak"></div>


<h1 class="fakespan-17 center"><?= CHtml::encode($this->savedSessionSummary()) ?> ASEP ENROLLMENT FORM</h1>
    <h3 class="fakespan-17 center" >Reservations begin <strong> <?= $reg_begin_tmp ?> </strong>!<br />
Please fill out one form per child<br />
Return this completed form, with payment, to the Front Office</h3>

<p>For questions or concerns, please contact  <?= $signup_contact_move_to_db; ?></p>



<p>Child’s Name ___________________________________________  Grade ______</p>
<p>Parent(s) or Guardian’s Name(s)  ____________________________ Email __________________ </p>
<p>Daytime Contact #s (1)_________________  (2)__________________ (3) ___________________</p>
<p class="fakespan-17 center" ><b>&gt;&gt; Please write your child’s name on the check! &lt;&lt;</b></p>


<div class="span-8">


<?php 
    $this->renderPartial(
        '_checkbox_table',
        array('classes' => $classes[0]));
?>

</div>


<div class="span-8 last">


<?php 
    $this->renderPartial(
        '_checkbox_table',
        array('classes' => $classes[1]));
?>

</div>

<div class="clear"></div>

<div class="span-17">


<p>Notes: ________________________________________________________________________________________</p>
<h3>ASEP Policies.</h3>
<ol> 
<li>Students must be picked up <i><b>immediately</b></i> after class.  </li>
<li>If your child goes to after-school care, please remember to inform the provider about the class.</li>
<li>If a student is attending a late Wednesday class, he/she must be under adult supervision while awaiting their class.</li>
<li>Students must wait quietly outside the classroom until the instructor is present at the start of class.</li>
<li>Once you have paid for a class, the contract is between you and the instructor.  Please see the instructor with questions or concerns.  If there are serious concerns, please contact an ASEP Coordinator immediately. </li>
<li>If a child is excessively disruptive, he/she may be removed from class. A refund <i><b>may</b></i> be provided. </li>
</ol>


<p>I, ______________________ (print name), have read and agree to the above policies, and I give permission for my child to attend the ASEP classes for which he/she is enrolled.</p>
<p>_________________________________________ _________________<br/>
      Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                      Date</p>

 Provide my email address to the instructor(s) of the class(es) that my son/daughter has enrolled in this session.<br /> Do not release my email address to class instructors. <br />
																 Revised <?= $revised_date_move_to_db;  ?><br />
</div>