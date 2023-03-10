<html>
<head><title>CalculateBMI</title></head>

<body>
<?php
    
    /*for code to work create a database in phpMyAdmin called Users with a 
    with a table called User with these attributes:
        name (text)
        email (text)
        password (text)
        height (int)
        weight(int)
        BMI (float)
    */

    $serverName = "localhost";
    $userName = "root"; 
    $password = ""; 
    $dbName = "Users";

    
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if($conn){
        echo "connected<br>";
    }
    else{
        echo "no connection<br>";
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bmi = (float) calcBMI($height, $weight);

    checkPassword($password);


    echo "Hello " . $name . "<br>height: " . $height . "<br>weight: " . $weight;
    echo "<br>Your bmi is " . number_format((float)$bmi, 2, '.', '');


    
    $sql = "insert into User(name,email,password,height,weight,bmi) values('$name','$email','$password','$height','$weight','$bmi')";

    if ($conn->query($sql) === TRUE) {
        echo "ADDED: ";
    } else {
        echo "Error: ";
    }
    
    
    
    function checkPassword($password, $password2){
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if ($password == $password2){
            echo "<br>Passwords match";
        }
        else{
            echo "<br>Passwords do not match";
        }
    }
    
    ///check if password is valid
    function validPassword($password){
        if (strlen($password) < 8){
            echo "<br>Password must be at least 8 characters";
            return false;
        }
        if (!preg_match("#[0-9]+#", $password)){
            echo "<br>Password must include at least one number";
            return false;
        }
        if (!preg_match("#[a-z]+#", $password)){
            echo "<br>Password must include at least one letter";
            return false;
        }
        if (!preg_match("#[A-Z]+#", $password)){
            echo "<br>Password must include at least one CAPS";
            return false;
        }
        if (!preg_match("#\W+#", $password)){
            echo "<br>Password must include at least one symbol";
            return false;
        }
        return true;
  
    }
    function calcBMI($height, $weight){

        $bmi = 703 * ($weight / ($height * $height));
        echo "<br>Your bmi is " . number_format((float)$bmi, 2, '.', '');
    }
    
    



    
?>

</body>
</html>
