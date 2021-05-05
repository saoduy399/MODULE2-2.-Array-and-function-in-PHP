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
        width:100px;
    }
</style>
<body>
<form method="post">
    <fieldset>
        <h2>Search customer</h2>
        <div>
            form: <input type="number" placeholder="yyy-mm-dd">
            to:   <input type="number" placeholder="yyy-mm-dd">
            <input type="submit" value="search">
        </div>
    </fieldset>
<table border="1px">
    <caption><h2>list of customers</h2></caption>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>day-of-birth</th>
        <th>address</th>
    </tr>
</table>
</form>
</body>
</html>
<?php

$customer_list=array(
    "0" => array("name"=>"gao red","day_of_birth"=>"1983/08/20","address"=>"tokyo"),
    "1" => array("name"=>"gao blue","day_of_birth"=>"1983/08/21","address"=>"tokyo"),
    "2" => array("name"=>"gao yellow", "day_of_birth"=>"1983/08/22","address"=>"tokyo"),
    "3" => array("name"=>"gao black","day_of_birth"=>"1983/08/17","address"=>"tokyo"),
    "4" => array("name"=>"gao white","day_of_birth"=>"1983/08/19","address"=>"tokyo"),
    );

function searchByDate($customers, $from_date, $to_date){
    if(empty($from_date) && empty($to_date)){
        return $customers;
    }
    $filtered_customers=[];
    foreach($customers as $customer){
        if(!empty($from_date)&&(strtotime($customer["day_of_birth"]) < strtotime($from_date)))
            continue;
        if(!emty($to_date)&&(strtotime($customer["day_of_birth"]) > strtotime($to_date)))
            continue;
        $filtered_customers[]=$customers;
    }
    return $filtered_customers;
}
$from_date=null;
$to_date=null;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $from_date=$_POST["form"];
    $to_date=$_POST["to"];
}
$filtered_customers=searchByDate($customer_list, $from_date, $to_date)
?>