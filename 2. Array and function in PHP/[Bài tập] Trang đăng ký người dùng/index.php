<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    fieldset{
        width: 100px;
    }
</style>
<body>
<form action="" method="post">
    <fieldset>
    <h2>Register</h2>
    <div>
        <p>Username:</p>
        <input type="text" name="username" placeholder="your user name">
        <p>Email:</p>
        <input type="email" name="myemail" placeholder="your email">
        <p>Phone number:</p>
        <input type="number" name="mynumber" placeholder="your number">
        <p></p>
        <input type="submit">
    </div>
    </fieldset>
</form>
</body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $email=$_POST["myemail"];
    $number=$_POST["mynumber"];
    $error=false;

    if(empty($username) || empty($email) || empty($number)){
        echo "You must fill all in order to register";
        echo "<br>";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)===false){
        echo "a vail email address";
    } else {
        echo "not a vail email address";
    }

    function loadRegistration($filename){
        $jsondata=file_get_contents($filename);
        $arr_data=json_decode($jsondata,true);
        return $arr_data;
    }

    function saveDataJson($filename,$username,$email,$number){
        try{
            $contact= array("name"=>$username,"email"=>$email,"number"=>$number);
            $arr_data=loadRegistration($filename);
            array_push($arr_data,$contact);
            $jsondate=json_encode($arr_data,JSON_PRETTY_PRINT);
            file_put_contents($filename,$jsondate);
            echo "successfully save";
        } catch (Exception $e){
            echo "error", $e->getMessage(), "\n";
        }
    }

    $registrations=loadRegistration("data.json");

}
?>

<h2>Registration list</h2>
<table>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Number</td>
    </tr>
    <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?= $registration['username']; ?></td>
            <td><?= $registration['myemail']; ?></td>
            <td><?= $registration['mynumber']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</html>