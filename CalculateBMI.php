<html>
<head><title>CalculateBMI</title></head>

<body>
<?php

    $name = $_POST["name"];

    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bmi = calcBMI($height, $weight)
    
    echo "Hello " . $name . "<br>height: " . $height . "<br>weight: " . $weight;
    echo "<br>Your bmi is " . number_format((float)$bmi, 2, '.', '');

    function checkPassword{
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if ($password == $password2){
            echo "<br>Passwords match";
        }
        else{
            echo "<br>Passwords do not match";
        }
    }

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