<?php
include("./config.php");
$id = $_GET['id'];
$sql = "select * from employees where id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$employee = $stmt->fetch(PDO :: FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Employee</title>
</head>
<body>
    <form>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" value="<?=$employee['firstname'];?>" readonly/>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" value="<?=$employee['lastname'];?>" readonly/>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="<?=$employee['email'];?>" readonly/>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?=$employee['phone'];?>" readonly/>
        <label for="postaladdress">Postal Address</label>
        <input type="text" name="postaladdress" id="postaladdress" value="<?=$employee['postaladdress'];?>" readonly/>
        <label for="physicaladdress">Physical Address</label>
        <input type="text" name="physicaladdress" id="physicaladdress" value="<?=$employee['physicaladdress'];?>" readonly/>
        <label for="department">Department</label>
        <input type="text" name="department" id="department" value="<?=$employee['department'];?>" readonly/>
        <a href="index.php"><input type="button" value="back"/></a>
    </form>
</body>
</html>