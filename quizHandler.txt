<?php
$count;
settype($count, "integer");

if(!empty($_POST['ques1'])){
    if($_POST['ques1'] == "1B"){
        $count++;     
    }
}    
if(!empty($_POST['ques2'])){
    if($_POST['ques2'] == "2A"){
        $count++;
    }
}
if(!empty($_POST['ques3'])){
    if($_POST['ques3'] == "3C"){
        $count++;
    }
}    
if(!empty($_POST['ques4'])){
    if($_POST['ques4'] == "4A"){
        $count++;
    }
}    
if(!empty($_POST['ques5'])){
    if($_POST['ques5'] == "5D"){
        $count++;
    }
}

echo "<h3> <br> Hello " . $_POST['ques0'] . ", you answered " . $count . " out of 5 questions correctly (" . (($count/5)*100) . "%). </h3>";

if($count < 5){
    echo "<h4> Find solutions to the questions that you missed at <a href='http://www.w3schools.com/php/default.asp'>W3Schools Online/PHP 5</a>. </h4>";
}


echo "Here's how other users did: <br>";
$user = $_POST['ques0'];
date_default_timezone_set("America/New_York");
$tmdateArr = array(getdate());
$time = $tmdateArr['hours'] . " : " . $tmdateArr['minutes'];
$date = $tmdateArr['mon'] . "-" . $tmdateArr['mday'] . "-" . $tmdateArr['year'];
$score = $count . "/5";
$ip = $_SERVER['REMOTE_ADDR'];
$ans = $_POST['ques1'] . ", " . $_POST['ques2'] . ", " . $_POST['ques3'] . ", " . $_POST['ques4'] . ", " . $_POST['ques5'];

$quizResultsFile = fopen("quizResults.txt", "a+");
$persData = $user . $score . $ip . $time . $date . $ans . "\n\r";
fwrite($quizResultsFile, $persData);
fclose($quizResultsFile);

echo "<br><br> <table> <th>Username</th> <th>Score</th> <th>IP Adress</th> <th>Time/Date</th> <th>Answers</th>";
fopen($quizResultsFile, "a+");
$lines = fgets($quizResultsFile);
while(!feof($quizResultsFile)){
    $file = explode(" ", $lines);
    echo "<td>" . $file['0'] . "</td><td>" . $file['1'] . "</td><td>" . $file['2'] . "</td><td>" . $file['3'] . $file['4'] . "</td><td>" . $file['5'] . "</td>";
}
fclose($quizResultsFile);

?>