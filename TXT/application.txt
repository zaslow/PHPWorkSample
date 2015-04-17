<!DOCTYPE html>
<html>
    <head>
        <?php include 'projectHeader.php'; ?>
        <?php require 'test_input.php'; ?>
        <script src="projectScripts.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../Other/applicationStyle.css" />
        <title> Membership Application </title>
    </head>
    <body>

        <?php
            $committee = test_input(filter_input(INPUT_POST, 'committee'));
            $interest = test_input(filter_input(INPUT_POST, 'interest'));
            $categoryPrice = test_input(filter_input(INPUT_POST, 'categoryPrice'));
            $result = '';
            
            function addNewMember(){
                global $result; global $committee; global $interest; global $category; global $kinex;
                
        /*      $newMembQuery = "INSERT INTO Member (committee, interest, category)
                    VALUES ('" . $idFriend$committee . "', '" . $interest . "', '" . $category . "')";
                mysqli_query($newMembQuery);
                if(mysqli_affected_rows($kinex) == 1) {*/ $result = "APPLICATION SUBMITTED!"; }    
        #   }
        ?>       
        
        <h2 id="appH2"> Enter the following information to apply for membership. </h2>
        
        <form method="post">
            <div id="committee">
                Which of the following committees would you consider becoming a member of? Check all that apply. <br><br>
                <?php 
                    $committees = array('Auditing', 'Education', 'Events', 'Fund Raising', 'Historical Resources', 'Membership',
                        'Newsletter', 'Program Development', 'Publicity', 'Refreshments', 'Telephone Committee', 'Trail Committee');
                    foreach($committees as $comm){
                        echo '<input type="checkbox" name="committee" value="' . $comm . '" /> ' . $comm . '<br>';
                    }
                ?>
            </div>
            
            <div id="interest">
                Which of the following are interests of yours? <br> Check all that apply. <br><br>
                <?php
                    $interests = array('Bird Watching', 'Cross-Country Skiing', 'Snow Shoeing', 'Hiking', 'Historical', 
                        'Horseback Riding', 'Hunting', 'Letterboxing', 'Mountain Biking', 'Orienteering', 'Open Space Preservation',
                        'Photography/Art', 'Snowmobiling', 'Wildlife Watching');
                    foreach($interests as $int){
                        echo '<input type="checkbox" name="interest" value="' . $int . '" /> ' . $int . '<br>';
                    }
                ?>
                <input type="checkbox" name="interest" value="Other:" /> Other: <input type="text" name="interest" size="25" /> 
            </div>
            
            <div id="category">
                Please select a membership category <br><br>
                <?php
                    $categoryPrices = array('Family (2 adults & children under age 18)'=>30.00, 'Individual'=>20.00, 'Senior (65+)'=>10.00, 
                        'Student (full-time with current student ID)'=>10.00, 'Associate Member (no voting privileges/discounts)'=>5.00);
                    $check = '';
                    
                    foreach($categoryPrices as $cat => $price){
                        echo '<input type="radio" name="categoryPrice" value="' . $cat . '" ' . $check . ' />' . $cat
                            . '<br> &nbsp;&nbsp;&nbsp;&nbsp; &#8627; &nbsp; $' . $price . '/year <br><br>';
                        if(($categoryPrice) == $cat) { $check = 'checked="checked"'; }                                                                                                
                    }
                ?>
            </div>
            
            <input type="submit" name="memberSubmit" id="memberSubmit" value="Submit" />
            
            <span class="message">
                <?php
                    $memberSubmit = filter_input(INPUT_POST, 'memberSubmit');
                    $error = '';
                    if(isset($memberSubmit)){
                        if(!isset($categoryPrice))  { $error = "* Membership category is required."; }
                        if(isset($categoryPrice))   { addNewMember(); }
                    }
                    echo $error;
                ?>
            </span>
            
            <span class="message">
                <?php echo $result; ?>
            </span>
            
        </form>
    </body>
</html>

<?php mysqli_close($kinex);
