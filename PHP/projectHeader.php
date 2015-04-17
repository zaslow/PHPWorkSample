<!DOCTYPE html>
<html>
    <head>
        <?php // Connect to DB
            $host = 'localhost';
            $user = $dbName = 'dcz4';
            $root = 'root';
            $password = '3717117';
            $kinex = mysqli_connect($host, $user, $password);
            if($kinex){
                # echo 'Connection to DB successful. <br><br>';
            }
            if(!$kinex){
                die('Could not connect: ' . mysql_error()) . '<br><br>';
            }
            mysqli_select_db($kinex, $dbName);
        ?>
        
        <link rel="stylesheet" type="text/css" href="../Other/mainStyle.css" /> 
        
        <title> Project Header </title>
    </head>
    
    <body>
        <div id="header"> <img src="../Other/headerLogo.jpg" alt="FUSF Logo" /> </div>
        
        <a id="return" href="index.php"> Return Home </a>
    </body>
</html>
