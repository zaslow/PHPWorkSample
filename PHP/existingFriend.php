<!DOCTYPE html>
<html>
<head>
    <title> Welcome Back </title>
    <?php include 'existingFriendLogin.php'; ?>
    <script src="../Other/projectScripts.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../Other/existingFriendStyle.css" />
</head>

<body>    
    <?php
    
        // $email_1 = "dcz4@pitt.edu";
        // $password = "hello";
        
        $getId = "SELECT idFriend FROM Friend WHERE email='" . $email_1 . "' AND password='" . $password . "'";
        $idFetch = mysqli_fetch_assoc(mysqli_query($kinex,$getId));
        $idFriend = $idFetch['idFriend'];

        $getName = "SELECT fName, surName FROM Friend WHERE idFriend='" . $idFriend . "'";
        $nameFetch = mysqli_fetch_assoc(mysqli_query($kinex,$getName));
        $nameFriend = $nameFetch['fName'] . " " . $nameFetch['surName'];

        $getMembStat = "SELECT category FROM Member WHERE fk(Friend)idFriend='" . $idFriend . "'";
        mysqli_query($kinex,$getMembStat);
        if(mysqli_affected_rows($kinex) == 1){
            $categFetch = mysqli_fetch_assoc(mysqli_query($kinex,$getMembStat));
            $category = $categFetch['category'];
        }
        else { $category = 'Friend'; }


        $getOrg = "SELECT TOP 1 organization FROM VolunteerHours WHERE fk(Friend)_idVolunteer='" . $idFriend . "'";
        mysqli_query($kinex,$getOrg);
        if(mysqli_affected_rows($kinex) == 1){
            $orgFetch = mysqli_fetch_assoc(mysqli_query($kinex,$getOrg));
            $organization = $orgFetch['organization'];    
        }
        else { $organization = 'F.U.S.F.'; }


        $getPos = "SELECT position FROM Admin WHERE fk(Friend)_idAdmin='" . $idFriend . "'";
        mysqli_query($kinex,$getPos);
        if(mysqli_affected_rows($kinex) == 1){
            $posFetch = mysqli_fetch_assoc(mysqli_query($kinex,$getPos)); 
            $position = $posFetch['position'];    
        }
        else { $position = 'N/A'; }
    ?>
    
    <h2 style="text-align: center"> Welcome back! </h2> <br>
    
    <div id="friendInfo">
        <?php
            echo "Name: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Dean Zaslow <br><br>"
                . "FUSF Status: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;" . $category . "<br><br>"
                . "Organization: &nbsp;&nbsp;&nbsp;&nbsp; " . $organization . "<br><br>"
                . "Position: &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;" . $position;
        ?>
    </div>
    
    <form method="post" action="donation.php">
        <input type="submit" name="dues" id="dues" value="Pay Dues" />
    </form>
    
</body>
</html>

<?php 
global $kinex;
mysqli_close($kinex);
