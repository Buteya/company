<?php
include("./config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "insert into employees (firstname,lastname,email,phone) values(:firstname,:lastname,:email,:phone)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':phone',$phone);
    try{
        if($stmt->execute()){
            header("location:index.php");
        }else{
            echo "Error creating an employee";
        }
    }catch(PDOException $E){
        echo $E->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        <input type="submit" name="submit" id="submit" value="submit">
    </form>
</body>
</html>