<!DOCTYPE html>

<html>
    <head>
        <?php include 'projectHeader.php'; ?>
        <?php require 'test_input.php'; ?>
        
        <link rel="stylesheet" type="text/css" href="../Other/loginStyles.css" /> 
                
        <title> Existing Friend Login </title>
        
    </head>
    <body>
        
        <br><br><br><br>
        
        <?php // Sanitize & check for user input; Run SQL query if login successful
            $email_1 = test_input(filter_input(INPUT_POST, "email_1"));
            $password = test_input(filter_input(INPUT_POST, "password"));
            $exSubmit = filter_input(INPUT_POST, 'exSubmit');
            $existingUserAction = '';

            function loginExistingUserSQL(){ 
                global $existingUserAction; global $exSubmit; global $email_1; global $password; global $kinex;

             if(isset($exSubmit)){

                    $idMatch = "SELECT idFriend FROM friend WHERE email='" . $email_1 . "' AND password='" . $password . "'";

                    mysqli_query($kinex, $idMatch);
                    $rows = mysqli_affected_rows($kinex);
                    if($rows == 1)  { $existingUserAction = 'existingFriend.php'; }
                  else              { echo 'Incorrect login credentials entered.'; }
                } 
            }
            
            if(isset($exSubmit))   { 
                if(!empty($email_1) && !empty($password))   { loginExistingUserSQL(); } 
                else                                        { $existingUserAction = ''; }          
            }
        ?>
        
        <form class="login" method="post" action="<?php echo $existingUserAction; ?>"> 
            
            Please enter your credentials. <br><br>   
 
            Email: <input type="text" id="email_1" name="email_1" value="<?php echo $email_1; ?>" /> <br><br>
            
            Password: <input type="password" id="password" name="password" value="<?php echo $password; ?>" /> <br><br>
            
            <input type="submit" class="submit" name="exSubmit" value="Submit" /> 
            
            <span class="error"> 
                <?php   // Check fields & print error if not filled out
                    $err_1 = '';
                    if(isset($exSubmit)){
                        if(empty($email_1))         { $err_1 = "* Email & password are required."; }
                        elseif(empty($password))    { $err_1 = "* Email & password are required."; }
                    }

                    echo $err_1;
                ?>
            </span> <br>
            
            <span class="disclaimer"> IMPORTANT: Submit once to record your information, and submit again to continue. </span>            
        
        </form>
        
    </body>
</html>
