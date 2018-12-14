<?php
    include("header.php");
    include("includes/config.php");
      $errors ='';
      $hashpass ='';
     session_start();
     //$token = $session['token'] = md5(uniqid(mt_rand(),true));


    if( isset($_REQUEST['signInButton']) ){

      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      if( empty($username) ){
        $errors .= 'Username field cannot be empty, please enter your username <br />';
      }
      if( empty($password) ){
        $errors .= 'Password field cannot be empty, please enter your password <br />';
      }

      if( !empty($username) and !empty($password) ){

          $hashpass =  sha1($password);


            $query ="SELECT * from users where
             users.username = '$username' AND users.password = '$hashpass'
                ";

            $results= mysqli_query($connection,$query);
            $row= mysqli_fetch_assoc($results);
            $trow= $row['type'];

            if(mysqli_num_rows($results) == 1 ){

                  if ($trow == 'L') {
                      $_SESSION['username']= $username;
                    header('location: lecturer.php');
                  }
                  else if ($trow == 'TA') {
                      $_SESSION['username']= $username;
                    header('location: ta.php');
                  }
                  else if ($trow == 'S') {
                      $_SESSION['username']= $username;
                    header('location: student.php');
                  }
                }

              else{
                echo $errors .= "Wrong username or password";
                }

          }

      }


?>


    <fieldset>
        <legend> Sign in here !!</legend>
        <?php
          echo $errors;
         ?>

    <form action= "" method="POST" >

      <table width="100%" cellpadding="0" cellspacing="0" >


        <tr>
          <td width="30%">Username</td>
          <td width="70%">
              <input type="text" name="username"/>
          </td>
        </tr>

        <tr>
          <td width="50%">Password</td>
          <td width="70%">
              <input type="password" name="password"/>
          </td>
        </tr>

        <tr>
          <td colspan="2">
              <input type="submit" value="Sign In"  name="signInButton"/>
          </td>
        </tr>
             <input type="hidden" name="token" value="<?=token;?>">
      </table>
      </form>

      <br>
      <form action="signIn.php" method="POST">
        <tr>
          <td colspan="2">
              <input type="button" value="Sign Up"  name="SignUpButton" onclick="window.location.href='register.php'" />
          </td>
        </tr>
      </form>

      <br>

        </fieldset>



<?php
   include("footer.php");
?>
