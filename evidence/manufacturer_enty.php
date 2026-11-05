<?php $db = new mysqli("localhost","root","","mysqlevidende");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body>
        <h3>manufacturuer entry</h3>
        <?php 
        if(isset($_POST['submit'])){
            extract($_POST);
            $db-> query ("CALL 	manufacturer_insert_procedure('$name','$address','$contact')");
            if($db->affected_rows){
                echo "success";
            }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="name"> <br>
            <textarea name="address"></textarea> <br>
            <input type="text" name="contact"> <br>
            <input type="submit" name="submit" value="submit">

        </form>
    </body>
</body>
</html>