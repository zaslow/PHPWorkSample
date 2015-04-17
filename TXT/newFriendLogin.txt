<!DOCTYPE html>

<html>
    <head>        
        <?php include 'projectHeader.php'; ?>
        <?php require 'test_input.php'; ?>
        
        <link rel="stylesheet" type="text/css" href="../Other/loginStyles.css" />
        
        <title> Existing Friend Login </title>
        
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        
        <?php 
            $fName = test_input(filter_input(INPUT_POST, 'fName'));
            $surName = test_input(filter_input(INPUT_POST, 'surName'));
            $address = test_input(filter_input(INPUT_POST, 'address'));
            $city = test_input(filter_input(INPUT_POST, 'city'));
            $state = test_input(filter_input(INPUT_POST, 'state'));
            $telephone = test_input(filter_input(INPUT_POST, 'telephone'));
            $email_2 = test_input(filter_input(INPUT_POST, 'email_2'));
            $newUserAction = '';
            
            if(!empty($fName) && !empty($surName) && !empty($address) && !empty($city) && !empty($state) && !empty($telephone) && !empty($email_2))
                    { addNewFriendSQL(); } /*
            else    { $existingUserAction = ''; }
            
            */  function addNewFriendSQL(){ // Add new friend to DB - SQL    
                global $newUserAction; # global $newSubmit; global $fName; global $surName; global $address; global $city;
            #   global $state; global $telephone; global $email; global $kinex;
            /*  if(isset($newSubmit)){           
                    $addNewFriend = "INSERT INTO friend (fName, surName, address, city, state, telephone, email)"
                        . "VALUES ('" . $fName . "', '" . $surName . "', '" . $address . "', '" . $city . "', '"
                        . $state . "', '" . $telephone . "', '" . $email . "')";
                    mysqli_query($kinex, $addNewFriend);
                    if(mysqli_affected_rows($kinex) == 1)   {*/ $newUserAction = 'newFriend.php'; } /*
                    else                                    {$newUserAction = '';}
                }
            } */
         ?>
        
        <br><br><br><br>
        
        <form class="login" method="post" action='<?php echo $newUserAction; ?>'> <!-- New Friend Info Form -->
            Please enter the following information. <br><br>
            First Name: <input type="text" id="fName" name="fName" value="<?php echo $fName; ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;
            Last Name: <input type="text" id="surName" name="surName" value="<?php echo $surName; ?>" /> <br><br>
            Address: <input type="text" id="address" name="address" value="<?php echo $address; ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;
            City: <input type="text" id="city" name="city" value="<?php echo $city; ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;
            State: <select id="state" name="state">

                <?php // Print state dropdown menu
                    $states = array('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA',
                        'ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA',
                        'RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY');
                    
                    foreach($states as $st_1){
                        $st_2="";
                        if(test_input(filter_input(INPUT_POST, 'state')) == $st_1)      { $st_2 = 'selected="selected"'; }
                        echo '<option value="'. $st_1. '" ' . $st_2 . '> ' . $st_1 . ' </option>';
                    }
                ?>

            </select> <br><br>
            Telephone: <input type="text" id="telephone" name="telephone" value="<?php echo $telephone; ?>"/> &nbsp;&nbsp;&nbsp;&nbsp;
            Email: <input type="text" id="email_2" name="email_2" value="<?php echo $email_2; ?>"/> <br><br>
            
            <?php $newSubmit = filter_input(INPUT_POST, 'newSubmit'); ?>
            <input type="submit" class="submit" name="newSubmit" value="Submit" />
            
            <span class="error">
                <?php
                    $err_2 = '';
                    if(isset($newSubmit)){
                        if(empty($fName))           { $err_2 = "* All fields are required."; } 
                        elseif(empty($surName))     { $err_2 = "* All fields are required."; }
                        elseif(empty($address))     { $err_2 = "* All fields are required."; }
                        elseif(empty($city))        { $err_2 = "* All fields are required."; }
                        elseif(empty($state))       { $err_2 = "* All fields are required."; }
                        elseif(empty($telephone))   { $err_2 = "* All fields are required."; }
                        elseif(empty($email_2))     { $err_2 = "* All fields are required."; }                        
                    }
                    echo $err_2;
                ?>
            </span> <br>
            
            <span class="disclaimer"> IMPORTANT: Submit once to record your information, and submit again to continue. </span>
        </form>
        
    </body>
</html>