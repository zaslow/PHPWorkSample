<!DOCTYPE html>
<html>
<head>
    <?php include 'projectHeader.php'; ?>
    <script src="Other/projectScripts.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../Other/newFriendStyle.css" />
</head>

<body>
    <?php echo mysqli_info($kinex); ?>
    
    <h1 style="text-align: center"> Welcome! </h1>
    <h2 style="text-align: center; font-weight: bold;"> Which of the following would you like to do? </h2> <br>
    
    <form method="post">
        <input type="submit" id="apply" name="apply" value="Apply for Membership" onclick="highlight('apply')" formaction="application.php" />
        <input type="submit" id="donate" name="donate" value="Donate to F.U.S.F." onclick="highlight('donate')" formaction="donation.php" />
        <input type="submit" id="log" name="log" value="Log Volunteer Hours" onclick="highlight('log')" formaction="volunteerLog.php" />
    </form>
    
    <?php 
        $apply = filter_input(INPUT_POST, 'apply');
        $donate = filter_input(INPUT_POST, 'donaate');
        $log = filter_input(INPUT_POST, 'log');
    ?>
    
</body>

</html>

<?php mysqli_close($kinex);