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
      <h1>Admin views</h1>
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
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/ClassInfo">Classes</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Student">Students</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Instructor">Instructors</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckIncome">Income (Receivable)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/CheckExpense">Expenses(Payable)</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/DepositDetails">Deposits</a>
      <br />
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Company">Companies</a>
      <br />
    </td>


    <td>

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
    </td>


  </tr>
</table>