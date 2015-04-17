<html>
<head>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
<?php 
// Validation & error messaages
$ques0 = $ques1 = $ques2 = $ques3 = $ques4 = $ques5 = "";
$q0Err = $q1Err = $q2Err = $q3Err = $q4Err = $q5Err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["ques0"])){
    $q0Err = "* Please enter your username.";
  } else{
    $ques0 = test_input($_POST["ques0"]);
  }
  if(empty($_POST["ques1"])){
    $q1Err = "* This question must be answered.";
  } else{
    $ques1 = test_input($_POST["ques1"]);
  }

  if(empty($_POST["ques2"])) {
    $q2Err = "* This question must be answered.";
  } else{
    $ques2 = test_input($_POST["ques2"]);
  }

  if(empty($_POST["ques3"])) {
    $q3Err = "* This question must be answered.";
  } else{
    $ques3 = test_input($_POST["ques3"]);
  }

  if(empty($_POST["ques4"])) {
    $q4Err = "* This question must be answered.";
  } else{
    $ques4 = test_input($_POST["ques4"]);
  }

  if(empty($_POST["ques5"])) {
    $q5Err = "* This question must be answered.";
  } else{
    $ques5 = test_input($_POST["ques5"]);
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>  
    
<h1> PHP Quiz </h1>
<form method='post' <?php if(empty($ques1) || empty($ques2) || empty($ques3) || empty($ques4) || empty($ques5)){
    echo "";} else{echo "action='quizHandler.php'";} ?> >

Please enter your username:
<input type='text' name='ques0' size='8' maxlength='10' value="<?php if (isset($_POST['ques0'])) echo $_POST['ques0']; ?>" />
<span class="error"> <?php echo $q0Err; ?></span> <br><br>

<b>1.) All of the following are valid PHP comments <i>except</i>...</b>
<span class="error"> <?php echo $q1Err; ?></span> <br>
<input type='radio' name='ques1' <?php if(isset($ques1) && $ques1 == "1A"){echo "checked";} ?> 
    value='1A'> // Comments here <br>
<input type='radio' name='ques1' <?php if(isset($ques1) && $ques1 == "1B"){echo "checked";} ?> 
    value='1B'> &#60&#33&#45&#45 Comments here &#45&#45&#62 <br>
<input type='radio' name='ques1' <?php if(isset($ques1) && $ques1 == "1C"){echo "checked";} ?>
    value='1C'> # Comments here <br>
<input type='radio' name='ques1' <?php if(isset($ques1) && $ques1 == "1D"){echo "checked";} ?>
    value='1D'> /* Comments here */ <br><br>

<b>2.) Select the proper way to join two or more strings with PHP.</b>
<span class="error"> <?php echo $q2Err; ?> </span> <br>
<input type='radio' name='ques2' <?php if(isset($ques2) && $ques2 == "2A"){echo "checked";} ?>
    value='2A'> $str1 = "Hello" . "World"; <br>
<input type='radio' name='ques2' <?php if(isset($ques2) && $ques2 == "2B"){echo "checked";} ?>
    value='2B'> $str2 = ("Hello" ++ "World"); <br>
<input type='radio' name='ques2' <?php if(isset($ques2) && $ques2 == "2C"){echo "checked";} ?>
    value='2C'> $str3 = " 'Hello' 'World' "; <br>
<input type='radio' name='ques2' <?php if(isset($ques2) && $ques2 == "2D"){echo "checked";} ?>
    value='2D'> $str4 = string[Hello] - string[World]; <br><br>

<b>3.) How are functions defined in PHP?</b>
<span class="error"> <?php echo $q3Err; ?></span> <br>
<input type='radio' name='ques3' <?php if(isset($ques3) && $ques3 == "3A"){echo "checked";} ?>
    value='3A'> functionname{}(code) <br>
<input type='radio' name='ques3' <?php if(isset($ques3) && $ques3 == "3B"){echo "checked";} ?>
    value='3B'> phpFunction name[]{code;} <br>
<input type='radio' name='ques3' <?php if(isset($ques3) && $ques3 == "3C"){echo "checked";} ?>
    value='3C'> function functionName(parameters){code;} <br>
<input type='radio' name='ques3' <?php if(isset($ques3) && $ques3 == "3D"){echo "checked";} ?>
    value='3D'> function{}; <br><br>

<b>4.) Select the correct result of the following <i>for</i> loop.</b>
<span class="error"> <?php echo $q4Err; ?></span> <br>
&nbsp&nbsp&nbsp&nbsp for(\$i=0; \$i<=5 \$i++){<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp echo \$i . \" + \" <br>&nbsp&nbsp&nbsp&nbsp }<br>        
<input type='radio' name='ques4' <?php if(isset($ques4) && $ques4 == "4A"){echo "checked";} ?>
    value='4A'> 0 + 1 + 2 + 3 + 4 + 5  <br>
<input type='radio' name='ques4' <?php if(isset($ques4) && $ques4 == "4B"){echo "checked";} ?>
    value='4B'> 15 <br>
<input type='radio' name='ques4' <?php if(isset($ques4) && $ques4 == "4C"){echo "checked";} ?>
    value='4C'> 1 + 2 + 3 + 4 + 5 <br>
<input type='radio' name='ques4' <?php if(isset($ques4) && $ques4 == "4D"){echo "checked";} ?>
    value='4D'> 0 + 1 + 2 + 3 + 4 <br><br>


<b>5.) Which of the following is NOT a PHP superglobal variable?</b>
<span class="error"> <?php echo $q5Err; ?></span> <br>
<input type='radio' name='ques5' <?php if(isset($ques5) && $ques5 == "5A"){echo "checked";} ?>
    value='5A'> $_REQUEST <br>
<input type='radio' name='ques5' <?php if(isset($ques5) && $ques5 == "5B"){echo "checked";} ?>
    value='5B'> $_GET <br>
<input type='radio' name='quse5' <?php if(isset($ques5) && $ques5 == "5C"){echo "checked";} ?>
    value='5C'> $_COOKIE <br>
<input type='radio' name='ques5' <?php if(isset($ques5) && $ques5 == "5D"){echo "checked";} ?>
    value='5D'> $_RETRIEVE <br><br>

<br> <input type='submit' name='submit' value='Submit'> <br>
Note: This form must be submitted <b>(2)</b> times; (1) to confirm quiz answers, and (1) to receive quiz results.

</body>
</html>

