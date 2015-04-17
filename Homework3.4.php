<!DOCTYPE html>
<!--
4) Write a php program that presents a form with a textbox requesting the
person's name. In addition, ask the user to choose a month, day and year from
drop downs that use looping. If they fail to complete the form and hit submit
re-present the form with their original answers selected (sticky).. When they
complete the form with a name and date call a function that finds the
appropriate zodiac sign for them and display it. Then the interface should ask
them if they want to try another month, day and year. I'm looking for good
logic, indentation, clean code, comments on the end braces, functions with
parameters ,well designed simple form, a nice flow, and use of looping and
conditionals.
-->

<html>
    <head>
        <title>Homework 3.4</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .errMsg{
                color:red;
            }
        </style>
    </head>
    <body>
        <h1> Find your astrological sign </h1>
        
        <?php //Form validation, required fields, and error messages
            $name = $month = $day = $year = "";
            $nameErr = $monthErr = $dayErr = $yearErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function test_input($answer) {
                    $answer = trim($answer);
                    $answer = stripslashes($answer);
                    $answer = htmlspecialchars($answer);
                    return $answer;
                }
                
                if(empty($_POST["name"])) {
                    $nameErr = "* Name is required.";
                } else{
                    $name = test_input($_POST["name"]);
                }
                
                if(empty($_POST["month"])) {
                    $monthErr = "* Month is required.";
                } else{
                    $month = test_input($_POST["month"]);
                }
                
                if(empty($_POST["day"])) {
                    $dayErr = "* Day is required.";
                } else{
                    $day = test_input($_POST["day"]);
                }
                
                if(empty($_POST["year"])) {
                   $yearErr = "* Year is required."; 
                } else{
                   $year = test_input($_POST["year"]); 
                }
            }
        ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Please enter your name and birthday to learn your astrological sign. <br><br> 
            Name: <input type="text" size="25" name="name" value="<?php echo $name;?>"> <br><br>
            Birthday:
            <select name="month">
                <option selected disabled hidden value=""></option>
                
                <?php //Create a month array and a sticky dropdown option for each
                $Months = array("Jan", "Feb", "Mar", "Apr", "May", "June",
                    "July", "Aug", "Sep", "Oct", "Nov", "Dec");
                foreach($Months as $mon){
		    $mon2="";
                    if($_POST["month"] == $mon) {
                        $mon2 = 'selected="selected"';                  
                    }
                    echo '<option value="'.$mon.'" '.$mon2.'>'.$mon.'</option>';                    
                }
                ?>
                
            </select> &nbsp;
            <select name="day">
                <option selected disabled hidden value=""></option>
                
                <?php /* Create an array of days of the month, fill it using a 'for' 
                         loop, and create a sticky dropdown option for each one. */
                $Days = array();
                for($i=0; $i<=30; $i++)
                    $Days[$i] = $i+1;             
                foreach($Days as $dy){
		    $dy2="";
                    if($_POST["day"] == $dy)
                        $dy2 = 'selected="selected"';                 
                    echo '<option value="'.$dy.'" '.$dy2.'>'.$dy.'</option>';
                }   
                ?>
                
            </select> &nbsp;
            <select name="year">
                <option selected disabled hidden value=""></option>
                
                <?php /* Create an array of the past hundred+ years, fill it using a 'for' 
                         loop, and create a sticky dropdown option for each one. */
                $Years = array();
                for($i=0; $i<=113; $i++)
                    $Years[$i] = $i+1900;
                foreach($Years as $yr){
                    $yr2="";
                    if($_POST["year"] == $yr)
                        $yr2 = 'selected="selected"';
                    echo '<option value="'.$yr.'" '.$yr2.'>'."$yr".'</option>';
                }
                ?>
            </select> <br><br>
            <span class="errMsg"> <?php echo $nameErr;?> </span> <br>
            <span class="errMsg"> <?php echo $monthErr;?> </span> <br>
            <span class="errMsg"> <?php echo $dayErr;?> </span> <br>
            <span class="errMsg"> <?php echo $yearErr;?> </span><br>
            <input type="submit" name="submit" value="Submit"> <br>
        </form>
        
        <?php /* The zodiacSign function determines the appropriate one of the 12 
                 astrological zodiac signs based on a given birthday entered. */
        function zodiacSign($DOB) {
            $zodiac = "";
	    list ($month, $day, $year) = explode ("-", $DOB);
            if(($month == "Mar" && $day >= 21) || ($month == "Apr" && $day <= 19)) 
                $zodiac = "Aries";
            else if(($month == "Apr" && $day >= 20) || ($month == "May" && $day <= 20))
                $zodiac = "Taurus";
            else if(($month == "May" && $day >= 21) || ($month == "June" && $day <= 20))
                $zodiac = "Gemini";
            else if(($month == "June" && $day >= 21) || ($month == "July" && $day <= 22))
                $zodiac = "Cancer";
            else if(($month == "July" && $day >= 23) || ($month == "Aug" && $day <= 22))
                $zodiac = "Leo";
            else if(($month == "Aug" && $day >= 23) || ($month == "Sep" && $day <= 22))
                $zodiac = "Virgo";
            elseif (($month == "Sep" && $day >= 23) || ($month == "Oct" && $day <= 22))
                $zodiac = "Libra";
            else if(($month == "Oct" && $day >= 23) || ($month == "Nov" && $day <= 21))
                $zodiac = "Scorpio";
            else if(($month == "Nov" && $day >= 22) || ($month == "Dec" && $day <= 21))
                $zodiac = "Sagittarius";
            else if(($month == "Dec" && $day >= 22 ) || ($month == "Jan" && $day <= 19))
                $zodiac = "Capricorn";
            else if(($month == "Jan" && $day >= 20) || ($month == "Feb" && $day <= 18))
                $zodiac = "Aquarius";
            else if(($month == "Feb" && $day >= 19) || ($month == "Mar" && $day <= 20))
                $zodiac = "Pisces";
            return $zodiac;            
	}
        
        /* Create a variable that checks if the Month, Day, and Year fields in the form
           have been submitted, and if so, formats them into a birthday for using the 
           zodiacSign() function.
         */
        $bDay = (isset($_POST['month']) ? $_POST['month'] : null)."-".
                (isset($_POST['day']) ? $_POST['day'] : null)."-".
                (isset($_POST['year']) ? $_POST['year'] : null);
        
        if(!empty($_POST) && !empty($_POST["name"]) && isset($_POST["year"])){        
            echo "<h2>".$_POST["name"].", you are a(n) ".zodiacSign($bDay).".</h2>";
            echo "<a href='Homework3.4.php'> Click here </a> to try another birthday.";
        }
	?>
    </body>
</html>
