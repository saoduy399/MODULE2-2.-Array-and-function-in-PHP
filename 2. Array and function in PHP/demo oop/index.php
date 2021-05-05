<?php
require"student.php";
$student01 = new Student;
$student01->setName("Tran Duc Duy");
echo $student01->getName();
echo "<br>";
$student01->setAddress("Tien Cat");
echo $student01->getAddress();
echo "<br>";
$student01->setEmail("tddnp565@gmail.com");
echo $student01->getEmail();
