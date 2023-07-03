<?php
include '../shared-files/db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=coins.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Country', 'Year', 'Value', 'Image Front', 'Image Back'));

$query = "SELECT * FROM Coins";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
    fputcsv($output, $row);
}

fclose($output);
?>
