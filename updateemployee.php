<?php
include("./config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $postaladdress = $_POST['postaladdress'];
    $physicaladdress = $_POST['physicaladdress'];
    $department = $_POST['department'];
    $sql = "update employees set firstname=:firstname, lastname=:lastname, email=:email, phone=:phone, postaladdress=:postaladdress, physicaladdress=:physicaladdress, department=:department where id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':postaladdress',$postaladdress);
    $stmt->bindParam(':physicaladdress',$physicaladdress);
    $stmt->bindParam(':department',$department);
    if($stmt->execute()){
        header("location:index.php");
    }else{
        echo "Error updating employee";
    }
}else{
    $id = $_GET['id'];
    $sql = "select * from employees where id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $employee = $stmt->fetch(PDO :: FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="id" value="<?=$employee['id'];?>"/>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" value="<?=$employee['firstname'];?>"/>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" value="<?=$employee['lastname'];?>"/>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="<?=$employee['email'];?>"/>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?=$employee['phone'];?>"/>
        <label for="postaladdress">Postal Address</label>
        <input type="text" name="postaladdress" id="postaladdress" value="<?=$employee['postaladdress'];?>"/>
        <label for="physicaladdress">Physical Address</label>
        <input type="text" name="physicaladdress" id="physicaladdress" value="<?=$employee['physicaladdress'];?>"/>
        <label for="department">Department</label>
        <input type="text" name="department" id="department" value="<?=$employee['department'];?>"/>
        <input type="submit" name="submit" id="submit" value="submit"/>
    </form>
</body>
</html>