<?php
  session_start();
    include("header.php");
    include("includes/config.php");
      $errors ='';
      $username= $_SESSION['username'];
?>
<html>
  <body>
      <table width="70%" cellpadding="1" cellspacing="2">
      <h2>All Students' Information</h2>
        <tr>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Grade</th>
        </tr>
        </table>
      </body>
</html>

<?php

$query ="SELECT * from users where
 users.type = 'S'
    ";

  $results= mysqli_query($connection,$query);

  while ( $student= mysqli_fetch_assoc($results)  ){
    echo'  <table width="70%" cellpadding="1" cellspacing="2">';
    echo '<tr>';
    echo '<td>'.$student['id'].'</td>';
    echo '<td>'.$student['full_name'].'</td>';
    echo '<td>'.$student['email'].'</td>';
    echo '<td>'.$student['grade'].'</td>';
    echo '</tr>';
    echo '<br />';

  }
?>
