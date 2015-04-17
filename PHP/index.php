<!DOCTYPE html>

<html>
    <head>
        
        <title> Welcome to FUSF Website </title>
        
        <?php include 'projectHeader.php'; ?>
        <script src="projectScripts.js" type="text/javascript"></script>
       
        <link rel="stylesheet" type="text/css" href="../Other/friendLoginStyle.css" /> 
    
    </head>
    
    <body id="mainContent">

        <br> <h1 style="text-align: center"> Friends of Upton State Forest </h1> <br>

        <!-- Main buttons -->

        <form method="post" action="existingFriendLogin.php">
            <input type="submit" id="existingUser" name="existingUser" value="Existing Friend" onclick="highlight('existingUser')" />    
        </form>

        <form method="post" action="newFriendLogin.php">
            <input type="submit" id="newUser" name="newUser" value="New Friend" onclick="highlight('newUser')" />        
        </form>
    
    </body> <!-- End main content -->
    
</html>



