<?php $this->pageTitle=Yii::app()->name; ?>

<table class="bordertable spacey">
  

  <tr>
    <td>
      <h1>Public Screens</h1>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/weekday">Weekday Schedule</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/descriptions">Descriptions</a>
      <br />
      <?php echo $this->renderPartial('/report/_signup_form'); ?>
    </td>


    <td>
      <h1>Admin Reports</h1>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/classDashboard">Class Dashboard</a>
      <br />
<a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/InstructorRequirements">Instructor Paperwork Status</a>
      <br />
<a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/OSSPTOInstructorPayments">OSSPTO Instructor Financial Summary</a>
<br />
<a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/dunningreport">A/R Dunning Report</a>
<br />
<a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/studentfinancial">Student Financial Summary</a>
<br />
<a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/integrityCheck">Data Integrity Check/Audit</a>


      <br />

    </td>



    <td>
      <h1>Data Entry/Admin</h1>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassInfo">Classes</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Student">Students</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Instructor">Instructors</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Company">Companies</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckIncome">Income (Receivable)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckExpense">Expenses(Payable)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/DepositDetails">Deposits</a>
      <br />
    </td>


    <td>
      <h1>Setup</h1>

      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassSession">Class Sessions</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/SchoolYear">School Years</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Roster">Roster</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/InstructorType">Instructor Types</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/RequirementType">Requirement Types</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Language">Languages</a>
      <br />
    </td>

  </tr>

<tr>
      <td><h1>Parent-Accessible</h1><br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupsPublic">Current Signups (emailable)</a>
      <br />
</td>
<td>
<h1>Instructor Screens</h1>
      <p>(Instructors log in with their email address to see)</p>
</td>

<td>
<h1>Office/Principal</h1>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/signupsheet">Sign-Up Sheet (Front Office Use)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/scholarships">Scholarships Summary</a>
      <br />
</td>

<td>
<h1>Utilities/Fixes</h1>
<?php
echo CHtml::link("Backup Database", 
                 array("Admin/backup",
                       ));
?>
<br />
<?php
echo CHtml::link("Fix checks with empty payer", 
                 array("CheckIncome/editable",
                       ));
?>
<br />
<?php
echo CHtml::link(
	'Graduate all students',
	array("Admin/graduate"),
	array('confirm' => "All 1st graders will now be 2nd graders, up the line, all 8th graders will be 9th graders and graduated, etc. \nThis action is not reversible!\nAre you sure you want to do this?"));

?>

</td>
</tr>

</table>
