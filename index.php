<?php
include("./config.php");
$sql="select * from employees";
$results=$db->query($sql);
$employees = $results->fetchAll(PDO :: FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        foreach($employees as $employee){
            ?>
            <tr>
                <td><?=$employee['id']?></td>
                <td><?=$employee['firstname']?></td>
                <td><?=$employee['lastname']?></td>
                <td><?=$employee['email']?></td>
                <td><?=$employee['phone']?></td>
                <td>
                    <a href="updateemployee.php?id=<?=$employee['id'];?>">Edit</a>
                    <a href="showemployee.php?id=<?$employee['id'];?>">Show</a>
                    <a href="">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>