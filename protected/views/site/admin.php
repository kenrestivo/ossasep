<?php $this->pageTitle=Yii::app()->name; ?>

<table class="schedule">
<tr>
  <th><h1>Dashboards</h1></th>
  <th><h1>Main views</h1></th>
  <th><h1>Setup</h1></th>
  <th><h1>Reports</h1></th>
  <th><h1>Utility Views</h1></th>
</tr>



<tr>
<td>
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/classDashboard">Class Dashboard</a> <br />

</td>


<td>
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassInfo">ClassInfo</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Student">Student</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Instructor">Instructor</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckIncome">CheckIncome</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckExpense">CheckExpense</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/DepositDetails">DepositDetails</a>
  <br />
</td>


<td>

  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/SchoolYear">SchoolYear</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassSession">ClassSession</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Roster">Roster</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Company">Company</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/InstructorType">InstructorType</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/RequirementType">RequirementType</a>
  <br />
      </td>

<td>
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupsheet">Sign-Up Sheet</a> <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/weekday">Weekday Schedule</a> <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/descriptions">Descriptions</a> <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupboxes">Signup Checkboxes</a><br />
</td>


<td>

  <p>(These may go away)</p>
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassMeeting">ClassMeeting</a>
  <br />

  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ExtraFee">ExtraFee</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Income">Income</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Expense">Expense</a>
  <br />

  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/InstructorAssignment">InstructorAssignment</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/RequiredFor">RequiredFor</a>
  <br />

  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/SchoolCalendar">SchoolCalendar</a>
  <br />

  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Signup">Signup</a>
  <br />
  <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/RequirementStatus">RequirementStatus</a>
  <br />
</td>
</tr>
</table>