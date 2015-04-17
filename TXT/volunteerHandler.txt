<?php

    require 'test_input.php';
    
    $organization = $date = $eventName = $eventType = $hours = $travel = $required = $message = '';
    $success = 'Your volunteer hours have been successfully added <br> to the FUSF records. Thank you for your support.';
    $reqMet = filter_input(INPUT_SERVER, "REQUEST_METHOD");
    
    if($reqMet == "POST"){
        $organization = test_input(filter_input(INPUT_POST, 'organization'));
        $date = test_input(filter_input(INPUT_POST, 'date'));
        $eventName = test_input(filter_input(INPUT_POST, 'eventName'));
        $eventType = test_input(filter_input(INPUT_POST, 'eventType'));
        $hours = test_input(filter_input(INPUT_POST, 'hours'));
        $travel = test_input(filter_input(INPUT_POST, 'travel'));
        
        if(empty($date))            { $required = '* Date is required.'; }
        elseif(empty($eventName))   { $required = '* Event name is required.'; }        
        elseif(empty($hours))       { $required = '* Hours are required.'; }
        else                        { $message = $success; }
    }