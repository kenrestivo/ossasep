<?php $this->pageTitle=Yii::app()->name; ?>

<table class="bordertable">
  <tr>
    <th>
      <h1>Public Screens</h1>
    </th>
    <th>
      <h1>Admin-only Reports</h1>
    </th>
    <th>
      <h1>Main views</h1>
    </th>
    <th>
      <h1>Setup</h1>
    </th>
    
  </tr>



  <tr>
    <td>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/weekday">Weekday Schedule</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/descriptions">Descriptions</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupsPublic">Current Signups (emailable)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Report/signupboxes">Signup Form (checkboxes)</a>
      <br />
    </td>


    <td>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/signupsheet">Sign-Up Sheet</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Admin/classDashboard">Class Dashboard</a>
      <br />

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


  </tr>
</table>