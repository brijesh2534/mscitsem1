<html>
<body align="center">

    <form action="" method="POST">
        <h1>Employee sheet</h1>
        <table border="2" align="center">
            <tr>
                <td>Enter employee no:-</td>
                <td> <input type="text" name="no" /></td>
            </tr>

            <td colspan="2">
                <input type="submit" name="insert" value="Insert" />
            </td>
            </tr>
    </form>
</body>

</html>
<?php
error_reporting(0);
$no = $_POST['no'];
$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$deletes = new MongoDB\Driver\BulkWrite();
$deletes->delete(
    ['empno' => $no]
);

$result = $conn->executeBulkWrite("emp1.e2", $deletes);

if ($result) {
    echo "Record deleted successfully \n";
}

?>
