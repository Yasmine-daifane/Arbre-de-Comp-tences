<?php
// Connect to your MySQLi database (replace with your actual database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "database1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT ville, COUNT(*) AS count FROM personne GROUP BY ville";
$result = $conn->query($query);

$data = array();
$labels = array();

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['ville'];
    $data[] = $row['ville'];
}

// Prepare the data as JSON for Chart.js
$response = array(
    'labels' => $labels,
    'data' => $data
);

echo json_encode($response);

// Close the database connection
$conn->close();
?>
