<?php
error_reporting(0);
$no=$_POST['no']; 
$nm=$_POST['nm'];
$sal=$_POST['sal'];

$m = new MongoDB\Driver\Manager('mongodb://localhost:27017');
  
//$command= new MongoDB\Driver\Command(["create" => 'e2']);
 echo "<br> collection created successfully";

//$cursor =$m->executeCommand("emp1",$command);
echo "<br> database mydb is selected";

    $bulk = new MongoDB\Driver\BulkWrite;

    $doc = array('empno'=>$no,
        'empnm'=>$nm,
        'salary'=>$sal);
        
$bulk->insert($doc);

$result = $m->executeBulkWrite('emp1.e2', $bulk);
echo "inserted successfully...";
?>
