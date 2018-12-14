<?php
    session_start();
    include("header.php");
    include("includes/config.php");
      $errors ='';
      $username= $_SESSION['username'];
?>
<html>
<form>
  <body>
    <input type="button" value="Update"  name="SignInButton" onclick="window.location.href='updating.php'" />
      <table id='table1' width="70%" cellpadding="1" cellspacing="2">
      <h2>All Students</h2>
        <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Student's Username</th>
        <th>Grade</th>
        </tr>
        </table>
</form>
</html>
<?php


    //  echo $errors .= 'Welcome';

      $query ="SELECT * from users where
       users.type = 'S'
          ";

        $results= mysqli_query($connection,$query);

        while ($student= mysqli_fetch_assoc($results)){
          echo'  <table width="70%" cellpadding="1" cellspacing="2">';
          echo '<tr>';
          echo '<td>'.$student['id'].'</td>';
          echo '<td>'.$student['full_name'].'</td>';
          echo '<td>'.$student['username'].'</td>';
          echo '<td>'.$student['grade'].'</td>';
          echo '</tr>';
          echo '<br />';
        }
?>
