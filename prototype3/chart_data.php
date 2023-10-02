<?php
// Database connection code (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get data
$query = "SELECT ville.Id, ville.Nom AS VilleNom, COUNT(personne.Id) AS TrainerCount 
          FROM personne 
          INNER JOIN ville ON personne.Ville_Id = ville.Id 
          GROUP BY ville.Id, ville.Nom";

$result = $conn->query($query);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Return data as JSON
echo json_encode($data);
?>
