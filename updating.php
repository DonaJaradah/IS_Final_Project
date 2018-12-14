<?php
    include("header.php");
    include("includes/config.php");
    $errors ='';
    $hashpass ='';
    $displayMessage = '';

    if( isset($_REQUEST['updateButton']) ){

      $s_username = $_REQUEST['s_username'];
      $new_grade = $_REQUEST['new_grade'];


    $query ="UPDATE users
    SET users.grade = '$new_grade'
    WHERE users.username ='$s_username'
        ";

    if( mysqli_query($connection, $query) ){
      echo $errors .= "Grades Updated";
      }
}

?>


    <fieldset>
        <legend> Update Grades !!</legend>

        <?php
          echo $errors;
         ?>

    <form action="" method="POST" >

      <table width="100%" cellpadding="0" cellspacing="0" >



        <tr>
          <td width="30%">Username</td>
          <td width="100%">
              <input type="text" name="s_username"/>
          </td>
        </tr>

        <tr>
          <td width="30%">New Grade</td>
          <td width="100%">
              <input type="text" name="new_grade"/>
          </td>
        </tr>



        <tr>
          <td colspan="2">
              <input type="submit" value="Update"  name="updateButton"/>
          </td>
        </tr>

        <br>
        <form action="signIn.php" method="POST">
          <tr>
            <td colspan="2">
                <input type="button" value="Back to Table"  name="SignInButton" onclick="window.location.href='lecturer.php'" />
            </td>
          </tr>
        </form>

      </table>


    </fieldset>



<?php
   include("footer.php");
?>
