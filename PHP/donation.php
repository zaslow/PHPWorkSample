<!DOCTYPE html>
<html>
    <head>
        
        <?php include 'projectHeader.php'; ?>
        <?php require 'test_input.php'; ?>
        
        <link rel='stylesheet' type='text/css' href='../Other/donationStyle.css' />
        
        <title>
            Make a Donation
        </title>
        
    </head>
    
    <body>
        <h1 id='donate_H1'> Donate to Friends of Upton State Forest </h1>
    
    <form method='post' id='donationForm'>
        <?php
            $amount = test_input(filter_input(INPUT_POST, 'amount'));
            $cardNum_1 = test_input(filter_input(INPUT_POST, 'cardNum_1'));
            $cardNum_2 = test_input(filter_input(INPUT_POST, 'cardNum_2'));
            $cardNum_3 = test_input(filter_input(INPUT_POST, 'cardNum_3'));
            $cardNum_4 = test_input(filter_input(INPUT_POST, 'cardNum_4'));        
            $expDateMon = test_input(filter_input(INPUT_POST, 'expDateMon'));
            $expDateDay = test_input(filter_input(INPUT_POST, 'expDateDay'));
            $expDateYr = test_input(filter_input(INPUT_POST, 'expDateYr'));
            $secCode = test_input(filter_input(INPUT_POST, 'secCode'));
            $result = '';
            $cardNum = $cardNum_1 . $cardNum_2 . $cardNum_3 . $cardNum_4;
            $expDate = $expDateMon . $expDateDay . $expDateYr;

            function addDonationSQL(){
                global $cardNum; global $secCode; global $expDate; global $kinex;
                $newPayment = "INSERT INTO 'dcz4' cardInfo ('cardNumber', 'secCode', 'expDate') VALUES ($cardNum, $secCode, $expDate)";
                mysqli_query($kinex,$newPayment);
                if(mysqli_affected_rows($kinex) == 1) { $result = "Payment Complete!"; }
            }
            
            if(!empty($secCode) && !empty($cardNum_1) && !empty($cardNum_2) && !empty($cardNum_3) && !empty($cardNum_4) && 
                !empty($amount) && !empty($expDateMon) && !empty($expDateDay) && !empty($expDateYr))
                    { addDonationSQL(); }                       
        ?>
        
        Enter amount (USD): $<input type='text' name='amount' id='donateAmount' size='6' value="<?php echo $amount; ?>"/>        
            &nbsp;&nbsp;&nbsp;&nbsp;
            
        Card Number:    <input type='text' name='cardNum_1' size='4' value="<?php echo $cardNum_1; ?>"/> -
                        <input type='text' name='cardNum_2' size='4' value="<?php echo $cardNum_2; ?>"/> -
                        <input type='text' name='cardNum_3' size='4' value="<?php echo $cardNum_3; ?>"/> -
                        <input type='text' name='cardNum_4' size='4' value="<?php echo $cardNum_4; ?>"/>                        
            
            <br><br>
            
        Expiration Date:
            <?php $select = ''; ?>
            <select name='expDateMon'>
                <?php
                    if($expDateMon = $i)    { $select = 'selected = "selected"'; }                
                    for($i=1; $i<=12; $i++) { echo "<option name='month' value='" . $i . "'" . $select . "> " . $i . " </option>"; }
                ?>
            </select>
            <select name='expDateDay'>
                <?php
                    if($expDateDay = $j)    { $select = 'selected = "selected"'; }                    
                    for($j=1; $j<=31; $j++) { echo "<option name='day' value='" . $j . "'" . $select . "> " . $j . " </option>"; }
                ?>
            </select>
            <select name='expDateYr'>
                <?php
                    if($expDateYr = $k)    { $select = 'selected = "selected"'; }                
                    for($k=14; $k<=25; $k++){ echo "<option name='year' value='" . $k . "'" . $select . "> " . $k . " </option>"; }
                ?>
            </select>
        
        &nbsp;&nbsp;&nbsp;&nbsp;                
        
        Security Code: <input type='text' name='secCode' size='4' value="<?php echo $secCode; ?>"/>
        
            <br><br>
            
        <?php $cardSubmit = filter_input(INPUT_POST, 'cardSubmit'); ?>  
        <input type='submit' name='cardSubmit' id='cardSubmit' value='SUBMIT' />
        
        <span class="message">
            <?php
                $err_3 = '';
                if(isset($cardSubmit)){
                    if(empty($amount))          { $err_3 = "* Your payment information is incomplete."; }
                    elseif(empty($cardNum_1))   { $err_3 = "* Your payment information is incomplete."; }
                    elseif(empty($cardNum_2))   { $err_3 = "* Your payment information is incomplete."; }                      
                    elseif(empty($cardNum_3))   { $err_3 = "* Your payment information is incomplete."; }           
                    elseif(empty($cardNum_4))   { $err_3 = "* Your payment information is incomplete."; } 
                    elseif(empty($expDateMon))  { $err_3 = "* Your payment information is incomplete."; }
                    elseif(empty($expDateDay))  { $err_3 = "* Your payment information is incomplete."; }
                    elseif(empty($expDateYr))   { $err_3 = "* Your payment information is incomplete."; }
                    elseif(empty($secCode))     { $err_3 = "* Your payment information is incomplete."; }
                }
                echo $err_3;
            ?>
        </span>
            
            <br><br>
        
        <span class="disclaimer"> IMPORTANT: Submit once to confirm payment info, <br> and submit again to continue. </span>
    
    </form>
    
        <br><br>
        
        <span class="message"> <?php echo $result; ?> </span>
        
    </body>
</html>

