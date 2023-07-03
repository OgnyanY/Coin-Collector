<?php
include '../shared-files/db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_FILES['csv_data']['name']) {
    $arrFileName = explode('.', $_FILES['csv_data']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['csv_data']['tmp_name'], "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $import = "INSERT into Coins(id,name,country,year,value,image_front,image_back) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
            mysqli_query($conn, $import);
        }
        fclose($handle);
    }
}

header('Location: catalog.php');
?>
