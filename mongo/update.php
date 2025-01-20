<html>

<body align="center ">

  <form action="" method="POST">
    <h1>Employee sheet</h1>
    <table border="2" align="center">
      <tr>
        <td>Enter employee no:-</td>
        <td> <input type="text" name="no" /></td>
      </tr>
      <tr>
        <td>Enter employee name:-</td>
        <td> <input type="text" name="nm" /></td>
      </tr>
      <tr>
        <td>Enter employee salary:-</td>
        <td> <input type="text" name="sal" /></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="update" value="update" />
        </td>
      </tr>
  </form>
</body>

</html>

<?php
$no = $_POST['no'];
$nm = $_POST['nm'];
$sal = $_POST['sal'];
$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$single_update = new MongoDB\Driver\BulkWrite();
$single_update->update(
  ['empno' => $no],
  ['$set' => ['empnm' => $nm, 'salary' => $sal]],
  ['multi' => false, 'upsert' => true]
);
$result = $conn->executeBulkWrite("emp1.e2", $single_update);

if ($result) {
  echo "Record updated successfully \n";
}
