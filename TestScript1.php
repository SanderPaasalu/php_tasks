<?php

include_once('PatientRecord.php');

// Connection to mySQL server
$con = mysqli_connect("localhost","root","");

mysqli_select_db($con, "test");

// query to mysql database
$result_a=mysqli_query($con,"SELECT * FROM insurance INNER JOIN patient ON insurance.patient_id = patient._id");

// while function to get all from database and use interfaces to print it out
while($row = mysqli_fetch_array($result_a))
{
    $_id = $row['_id'];
    $patient_id = $row['patient_id'];
    $iname = $row['iname'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];
    $first = $row['first'];
    $last = $row['last'];
    $pn = $row['pn'];
    $dob = $row['dob'];

$insurance = new Insurance($_id, $patient_id, $iname, $from_date, $to_date, $pn);
$insurancerecords = $insurance -> patient_records($_id);
$patient = new Patient($patient_id,  $first, $last, $dob, $pn, $insurancerecords);
echo $patient -> patient_records($pn);    
}
$row = mysqli_fetch_array($result_a);

