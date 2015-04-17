<?php
            $host = 'localhost';
            $user = $dbName = 'dcz4';
            $root = 'root';
            $password = '3717117';
            $kinex = mysqli_connect($host, $root);
            if($kinex){
                echo 'Connection to DB successful. <br><br>';
            }
            if(!$kinex){
                die('Could not connect: ' . mysql_error()) . '<br><br>';
            }
            mysqli_select_db($kinex, $dbName);
            
            $bob = 'Bob';
            $query = "SELECT fName, surName FROM Friend WHERE fName='" . $bob . "'";
            $fetch = mysqli_fetch_assoc(mysqli_query($kinex,$query));
            $fName = $fetch['fName'];
            $surName = $fetch['surName'];
            echo $surName . ", " . $fName;
            
/*            
$idMatch = "SELECT idFriend FROM Friend WHERE email='" . $email_1 . "' AND password='" . $password . "'";
$idFetch = mysqli_fetch_assoc(mysqli_query($idMatch));
$idFriend = $idFetch['idFriend'];
echo $idFriend . "<br><br>";

$getName = "SELECT fName, surName FROM Friend WHERE idFriend='" . $idFriend . "'";
$nameFetch = mysqli_fetch_assoc(mysqli_query($getName));
$nameFriend = $nameFetch['fName'] . " " . $nameFetch['surName'];
echo $nameFriend . "<br><br>";

$getMembStat = "SELECT category FROM Friend WHERE idFriend='" . $idFriend . "'";
$categFetch = mysqli_fetch_assoc(mysqli_query($getMembStat));
$category = $categFetch['category'];
echo $category . "<br><br>";
*/