<?php
    include("header.php");
    include("includes/config.php");
    $errors ='';
    $hashpass ='';
    $displayMessage = '';

    if( isset($_REQUEST['registerButton']) ){

      $full_name = $_REQUEST['full_name'];
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      $confirmation_password = $_REQUEST['confirmation_password'];
      $type = $_REQUEST['type'];
      $email = $_REQUEST['email'];


      // Check all fields are not empty
      if( empty($full_name) ){
        $errors .= 'Name field cannot be empty, please enter your full name <br />';
      }
      if( empty($username) ){
        $errors .= 'Username field cannot be empty, please enter your username <br />';
      }
      if( empty($password) ){
        $errors .= 'Password field cannot be empty, please enter your password <br />';
      }
      if( empty($confirmation_password) ){
        $errors .= 'Confirmation password field cannot be empty, please enter your password <br />';
      }
      if( empty($type) ){
        $errors .= 'Type field cannot be empty, please enter your user type <br />';
      }
      if( empty($email) ){
        $errors .= 'Email field cannot be empty, please enter your email <br />';
      }



      if( !empty($full_name) and !empty($username) and !empty($email) and !empty($type) and !empty($password) and !empty($confirmation_password) ){

        if ( $password != $confirmation_password ){
          echo  $displayMessage .= 'Password does not match confirmation password';
              return;
            }

        if ( $password == $confirmation_password ){

          $ucl = preg_match('/[A-Z]/', $password); // Uppercase Letter
          $lcl = preg_match('/[a-z]/', $password); // Lowercase Letter
          $dig = preg_match('/\d/', $password); // Numeral
          $nos = preg_match('/\W/', $password); // Non-alpha/num characters (allows underscore)
          $len =  strlen($password);

         if( !$ucl || !$lcl || !$dig || !$nos || $len < 8    ){
            echo $displayMessage .= 'Passwordlength must be atleast 8 characters long, <br /> contains at least one uppercase letter,<br />
                 one lowercase letter,<br /> one digit, <br /> and one non-alphnumeric symbol' ;
              return;
            }


          $hashpass =  sha1($password);

            $query = "INSERT INTO users SET
                id='',
                full_name='$full_name',
                username='$username',
                password='$hashpass',
                confirmation_password='$hashpass',
                type='$type',
                grade='',
                email='$email'
                ";


              if( mysqli_query($connection, $query) ){
                echo $errors .= "Form Sumbitted Successfully";
              }

        }

      }

    }


?>


    <fieldset>
        <legend> Signup now to get access !!</legend>

        <?php
          echo $errors;
         ?>

    <form action="" method="POST" >

      <table width="100%" cellpadding="0" cellspacing="0" >

        <tr>
          <td width="30%">Full Name</td>
          <td width="100%">
              <input type="text" name="full_name"/>
          </td>
        </tr>

        <tr>
          <td width="30%">Username</td>
          <td width="100%">
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
          <td width="30%">Confirmation Password</td>
          <td width="100%">
              <input type="password" name="confirmation_password"/>
          </td>
        </tr>

        <tr>
          <td width="30%">Email</td>
          <td width="70%">
              <input type="email" name="email"/>
          </td>
        </tr>


        <tr>
          <td width="50%">Type</td>
          <td width="70%">
              <input type="text" name="type"/>
          </td>
        </tr>

        <tr>
          <td colspan="2">
              <input type="submit" value="Sign Up"  name="registerButton"/>
          </td>
        </tr>

      </table>
      </form>

      <br>
      <form action="signIn.php" method="POST">
        <tr>
          <td colspan="2">
              <input type="button" value="Sign In"  name="SignInButton" onclick="window.location.href='signIn.php'" />
          </td>
        </tr>
      </form>

    </fieldset>



<?php
   include("footer.php");
?>
