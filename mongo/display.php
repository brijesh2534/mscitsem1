<?php
    $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $filter = [];
    $option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("emp1.e2", $read);

echo "Display data:\n";
foreach ($all_users as $user)
 {
    //echo nl2br($user->empno.' '.$user->empnm.' has following roles:' . "\n");
    echo $user->empno;
    echo $user->empnm;
    echo $user->salary;
    echo "<br>";
 }
?>
