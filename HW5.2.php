<?php
    echo "<form method='post' enctype='multipart/form-data'>"
        . "<br> Please upload a small file (250kb max): <br><br>"
        . "<input type='hidden' name='MAX_FILE_SIZE' value='250000' />"
        . "<input type='file' name='fileUpload' value='fileUpload' /> <br><br>"
        . "<input type='submit' name='submit' value='Submit'> <br>"; 
    
    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!file_exists($_FILES['fileUpload']['tmp_name']) &&
         !is_uploaded_file($_FILES['fileUpload']['tmp_name'])){
            echo "<br> File upload unsuccessful <br>";                                      
        }
        else{ 
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], 
              "Uploaded/" . $_FILES['fileUpload']['name']);
            $uploadWin = "Uploaded/" . $_FILES['fileUpload']['name'];
                if(!file_exists($uploadWin)){
                    echo "<br> Could not move uploaded file to \"Uploaded/" 
                    . htmlentities($_FILES['fileUpload']['name']) 
                    . "\"<br /> \n\r";
                }    
                else{
	            echo "<br> Successfully uploaded "
                    . htmlentities($_FILES['fileUpload']['size']) . "-byte file"
                    . "<br><br> of file type \"" . htmlentities($_FILES['fileUpload']['type']) . ",\"" 
                    . "<br><br> called <i>" . htmlentities($_FILES['fileUpload']['name']) . "</i>, <br><br>"
                    . "to \"Uploaded/" . htmlentities($_FILES['fileUpload']['name'])
                    . ".\"<br /> \n\r";                    
                }            
            }        
    }      
    echo "</form>";
?>
        


