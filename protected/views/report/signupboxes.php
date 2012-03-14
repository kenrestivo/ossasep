
<?php   Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/printabletable.css', 'print'); ?>

<div class="span-17">
<h1>After-School Enrichment Program – <?= CHtml::encode($this->savedSessionSummary()) ?></h1>

    <h3>Classes begin <strong><?= date('F jS', strtotime(ClassSession::current()->start_date)) ?></strong>.</h3>
    <!-- TODO: make the reservation begin date dynamically generated -->
    <h3>Reservations begin <strong>
<?php
    echo date("l, F jS \a\\t g:i a", strtotime(ClassSession::current()->registration_starts));
?>
</strong>!</h3>


<h3>Important Notes about Enrollment Process:</h3>
<ul>
<li>  Many classes fil  up quickly!  </li>
     First come, first served: </li>
Enrollment is determined by the order in which Patricia, in the front office, receives it.  </li>
<li> You wil  receive a school-wide e-mail confirmation to confirm enrol ment or a notice in your family folder (for non-computer users.)</li>
<li> Wait-lists do not rol  over from the previous sessions.  If your child is placed on a waitlist, you wil  be notified via email or phone.  You may choose to stay on the waitlist or have your check returned to you.  If you choose to remain on the waitlist, you wil  be notified if a space becomes available.  You may request to be removed from the waitlist at any time and your check wil  be returned.</li>
<li> If you write a check for multiple classes, the check wil  be cashed.  If a class is canceled, a refund check wil  be written (refunds can take up to two weeks to be processed).</li>
<li> Scholarships are available . Please contact the principal, Karen Gnusti, if you are interested.  Please turn in a form 
with “scholarship pending” listed to hold a spot in a class (especial y for classes that sel  out quickly).</li>
<li> If a student is interested in a class, but does not fit the grade range or other criteria, please contact an ASEP </li>
Coordinator. There are exceptions in some (not al ) classes.</li>
For questions or concerns, please contact the ASEP coordinator,</li>
Heidi Lucey via email<a href="mailto:leopictures@hotmail.com">leopictures@hotmail.com</a> or cell 415-203-3812. </li>
</ul>
<p>Revised 1/3/2012</p>
<hr>

</div>

<div class="clear advisorybreak"></div>


<div class="span-17">

<A name=2></a><b>Winter 2012 ASEP ENROLLMENT FORM</b><br>
Reservations begin <b>Wednesday, January 4th at 8am!</b><br>
<b>Please fill out one form per child</b><br>
<b>Return this completed form, with payment, to the Front Office</b><br>
For questions or concerns, please contact Heidi Lucey via email at leopictures@hotmail.com or cel  415-203-3812<br>
Child’s Name ___________________________________________  Grade ______<br>
Parent(s) or Guardian’s Name(s)  ____________________________ Email __________________ <br>
Daytime Contact #s (1)_________________  (2)__________________ (3) ___________________<br>
<b>&gt;&gt; Please write your child’s name on the check! &lt;&lt;</b><br>

</div>


<div class="clear"></div>

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


Notes: ________________________________________________________________________________________<br>
<b>ASEP Policies</b>.<br>1. Students must be picked up <i><b>immediately</b></i> after class.  <br>2. If your child goes to after-school care, please remember to inform the provider about the class.<br>3. If a student is attending a late Wednesday class, he/she must be under adult supervision while awaiting their class.<br>4. Students must wait quietly outside the classroom until the instructor is present at the start of class.<br>5. Once you have paid for a class, the contract is between you and the instructor.  Please see the instructor with <br>questions or concerns.  If there are serious concerns, please contact an ASEP Coordinator immediately. <br>6. If a child is excessively disruptive, he/she may be removed from class. A refund <i><b>may</b></i> be provided. <br>
I, ______________________ (print name), have read and agree to the above policies, and I give permission for my child <br>to attend the ASEP classes for which he/she is enrol ed.<br>
_________________________________________<br>
_________________<br>
Signature<br>
Date<br>
 Provide my email address to the instructor(s) of the class(es) that my son/daughter has enrol ed in this session.<br> Do not release my email address to class instructors. <br>
Revised 1/3/2012<br>
</div>