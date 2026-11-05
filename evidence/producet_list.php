<?php $db = new mysqli("localhost","root","","mysqlevidende");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Producet list</h3>
    <?php 
    $raw = $db ->query("SELECT * FROM 	above_50000_producet");
    ?>
    <Table>
        <tr>
            <th>ID</th>
            <th>Produect Name</th>
            <th>Price</th>
            <th>Manufacturuer ID</th>
        </tr>
        <?php
            while($row = $raw->fetch_assoc()){?>
            <tr>
                <td><?php echo $row ['id']?></td>
                <td><?php echo $row ['name']?></td>
                <td><?php echo $row ['price']?></td>
                <td><?php echo $row ['manufacturer_id']?></td>
                
            </tr>
                <?php
            }
        ?>
    </Table>
</body>
</html>