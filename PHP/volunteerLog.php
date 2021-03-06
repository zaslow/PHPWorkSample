<!DOCTYPE html>
<html>
    <head>        
        <?php include 'projectHeader.php'; ?>
        <?php require 'volunteerHandler.php'; ?>
        
        <link rel="stylesheet" type="text/css" href="../Other/volunteerStyle.css" />
        
        <title>
            Log Volunteer Hours
        </title>
    </head>
    
    <body>
        <h1> Log Volunteer Hours </h1>
        
        <form method="post">
        <?php
            $organization = test_input(filter_input(INPUT_POST, 'organization'));
            $date = test_input(filter_input(INPUT_POST, 'date'));
            $eventName = test_input(filter_input(INPUT_POST, 'eventName'));
            $eventType = test_input(filter_input(INPUT_POST, 'eventType'));
            $hours = test_input(filter_input(INPUT_POST, 'hours'));
            $travel = test_input(filter_input(INPUT_POST, 'travel'));
        ?>    
            <table>
                <tr>
                    <th> Organization </th>
                    <th> Date </th>
                    <th> Event Name </th>

                </tr>
                <tr>
                    <td> <input type="text" name="organization" id="organization" /></td>
                    <td> <input type="text" name="date"         id="date" />        </td>
                    <td> <input type="text" name="eventName"    id="eventName" />   </td>
                </tr>
                <tr>
                    <td> <br> </td>
                    <td> <br> </td>
                    <td> <br> </td>
                </tr>
                <tr>
                    <th> Event Type </th>
                    <th> Hours </th>
                    <th> Travel Mileage </th>                    
                </tr>
                <tr>
                    <td> <input type="text" name="eventType"    id="eventType" />   </td>
                    <td> <input type="text" name="hours"        id="hours" />       </td>
                    <td> <input type="text" name="travel"       id="travel" />      </td>                    
                </tr>
            </table>
            <?php
                if(empty($date))            { $required = '* Date is required.'; }
                elseif(empty($eventName))   { $required = '* Event name is required.'; }        
                elseif(empty($hours))       { $required = '* Hours are required.'; }
                else                        { $message = $success; }
            ?>            
            <span id="required"> <?php echo $required; ?> </span> 
            <input type="submit" name="hoursSubmit" id="hoursSubmit" value="Add Volunteer Hours to Records*" />
            <span id="confirm"> * Volunteer hours must be confirmed by a FUSF member. </span>
        </form>
        
        <span id="message"> <?php echo $message; ?> </span>
    </body>
</html>